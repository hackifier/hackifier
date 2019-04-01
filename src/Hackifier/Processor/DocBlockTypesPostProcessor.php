<?php

declare(strict_types=1);

/**
 * This file is part of the Hackifier package.
 *
 * (c) Saif Eddin Gmati <azjezz@protonmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Hackifier\Processor;

use Hackifier\HackAST\EditableList;
use Hackifier\HackAST\EditableNode;
use function Hackifier\HackAST\Missing;
use Hackifier\HackAST\Syntax\FunctionDeclaration;
use Hackifier\HackAST\Syntax\FunctionDeclarationHeader;
use Hackifier\HackAST\Syntax\NullableTypeSpecifier;
use Hackifier\HackAST\Syntax\ParameterDeclaration;
use Hackifier\HackAST\Syntax\SimpleTypeSpecifier;
use Hackifier\HackAST\Token\ArraykeyToken;
use Hackifier\HackAST\Token\ArrayToken;
use Hackifier\HackAST\Token\BoolToken;
use Hackifier\HackAST\Token\ClassnameToken;
use Hackifier\HackAST\Token\FloatToken;
use Hackifier\HackAST\Token\GreaterThanToken;
use Hackifier\HackAST\Token\IntToken;
use Hackifier\HackAST\Token\LessThanToken;
use Hackifier\HackAST\Token\MixedToken;
use Hackifier\HackAST\Token\NameToken;
use Hackifier\HackAST\Token\NoreturnToken;
use Hackifier\HackAST\Token\NumToken;
use Hackifier\HackAST\Token\QuestionToken;
use Hackifier\HackAST\Token\ResourceToken;
use Hackifier\HackAST\Token\StringToken;
use Hackifier\HackAST\Token\VariableToken;
use PhpParser\Node;
use PhpParser\Node\Stmt\Function_;
use Psalm\DocComment;
use Psalm\Exception\DocblockParseException;
use Psalm\Type;

class DocBlockTypesPostProcessor implements IPostProcessor
{
    /**
     * Process the hack ast node `$hack` after being transformed from `$php`.
     *
     * @param Node|Function_                   $php
     * @param EditableNode|FunctionDeclaration $hack
     * @param int                              $depth
     *
     * @return EditableNode
     *
     * @throws DocblockParseException
     */
    public function process(Node $php, EditableNode $hack, int $depth): EditableNode
    {
        if (!$hack instanceof FunctionDeclaration) {
            return $hack;
        }

        $tags = DocComment::parse($php->getDocComment()->getText())['specials'] ?? [];
        $return = array_values($tags['return'] ?? []);
        $params = array_values($tags['param'] ?? []);

        if (count($return) > 0) {
            /** @var string $return */
            $return = $return[0];
            $type = $this->getTypeNodeFromString($return);

            if (null !== $type) {
                $hack = $this->setReturnType($hack, $type);
            }
        }

        if (count($params) > 0) {
            /** @var string $param */
            foreach ($params as $param) {
                $dollarSign = strpos($param, '$');
                $variable = trim(substr($param, $dollarSign));
                $typeString = trim(substr($param, 0, $dollarSign - 1));
                $type = $this->getTypeNodeFromString($typeString);

                if (null !== $type) {
                    $hack = $this->setParamType(
                        $hack,
                        $variable,
                        $type
                    );
                }
            }
        }

        return $hack;
    }

    protected function setReturnType(EditableNode $function, EditableNode $type): EditableNode
    {
        /** @var FunctionDeclarationHeader $header */
        $header = $function->getDescendantsOfType(FunctionDeclarationHeader::class)[0];
        $mixed = $header->getType()->getDescendantsOfType(MixedToken::class)[0] ?? null;

        if (null === $mixed) {
            return $function;
        }

        return $function->replace($mixed, $type);
    }

    protected function setParamType(EditableNode $function, string $name, EditableNode $type): EditableNode
    {
        $parameters = $function->getDescendantsOfType(ParameterDeclaration::class);

        /** @var ParameterDeclaration $parameter */
        foreach ($parameters as $parameter) {
            /** @var MixedToken|null $mixed */
            $mixed = $parameter->getDescendantsOfType(MixedToken::class)[0] ?? null;
            /** @var VariableToken|null $variable */
            $variable = $parameter->getDescendantsOfType(VariableToken::class)[0] ?? null;

            if (null !== $mixed && null !== $variable && $variable->getCode() === $name) {
                $function = $function->replace($mixed, $type);
            }
        }

        return $function;
    }

    protected function getTypeNodeFromString(string $typeString): ?EditableNode
    {
        $union = Type::parseString($typeString);

        if ($union instanceof Type\Union) {
            return $this->getTypeNodeFromUnion($union);
        }

        return $this->getTypeNodeFromAtomic($union);
    }

    protected function getTypeNodeFromUnion(Type\Union $union): EditableNode
    {
        $nullable = $union->isNullable();
        $types = [];
        /** @var Type\Union|Type\Atomic $type */
        foreach ($union->getTypes() as $type) {
            if (!$type instanceof Type\Atomic\TNull) {
                $types[] = $type instanceof Type\Union ? $this->getTypeNodeFromUnion($type) : $this->getTypeNodeFromAtomic($type);
            }
        }

        if (1 === count($types)) {
            return $nullable ? new NullableTypeSpecifier(new QuestionToken(Missing(), Missing()), $types[0]) : new SimpleTypeSpecifier($types[0]);
        }

        if ($union->hasInt() && 2 === count($types) && ($union->hasFloat() || $union->hasString())) {
            if ($union->hasFloat()) {
                $type = new NumToken(Missing(), Missing());
            } else {
                $type = new ArraykeyToken(Missing(), Missing());
            }

            return $nullable ? new NullableTypeSpecifier(new QuestionToken(Missing(), Missing()), $type) : new SimpleTypeSpecifier($type);
        }

        return new SimpleTypeSpecifier(new MixedToken(Missing(), Missing()));
    }

    protected function getTypeNodeFromAtomic(Type\Atomic $atomic): EditableNode
    {
        if ($atomic instanceof Type\Atomic\TArray) {
            return new ArrayToken(Missing(), Missing());
        }

        if ($atomic instanceof Type\Atomic\TArrayKey) {
            return new ArraykeyToken(Missing(), Missing());
        }

        if ($atomic instanceof Type\Atomic\TBool) {
            return new BoolToken(Missing(), Missing());
        }

        if ($atomic instanceof Type\Atomic\TClassString) {
            if ('object' === $atomic->as) {
                return new StringToken(Missing(), Missing());
            }

            return new ClassnameToken(
                Missing(),
                EditableList::fromItems([
                    new LessThanToken(Missing(), Missing()),
                    new NameToken(Missing(), Missing(), $atomic->as),
                    new GreaterThanToken(Missing(), Missing()),
                ])
            );
        }

        if ($atomic instanceof Type\Atomic\TResource) {
            return new ResourceToken(Missing(), Missing());
        }

        if ($atomic instanceof Type\Atomic\TNever) {
            return new NoreturnToken(Missing(), Missing());
        }

        if ($atomic instanceof Type\Atomic\TInt) {
            return new IntToken(Missing(), Missing());
        }

        if ($atomic instanceof Type\Atomic\TFloat) {
            return new FloatToken(Missing(), Missing());
        }

        if ($atomic instanceof Type\Atomic\TNumeric) {
            return new NumToken(Missing(), Missing());
        }

        if ($atomic instanceof Type\Atomic\TLiteralClassString) {
            return new ClassnameToken(
                Missing(),
                EditableList::fromItems([
                    new LessThanToken(Missing(), Missing()),
                    new NameToken(Missing(), Missing(), 'static' === $atomic->value ? 'self' : $atomic->value),
                    new GreaterThanToken(Missing(), Missing()),
                ])
            );
        }

        if ($atomic instanceof Type\Atomic\TString) {
            return new StringToken(Missing(), Missing());
        }

        return new MixedToken(Missing(), Missing());
    }
}
