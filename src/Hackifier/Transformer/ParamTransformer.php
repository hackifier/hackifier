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

namespace Hackifier\Transformer;

use Hackifier\HackAST\EditableNode;
use function Hackifier\HackAST\Missing;
use Hackifier\HackAST\Syntax\ParameterDeclaration;
use Hackifier\HackAST\Syntax\SimpleTypeSpecifier;
use Hackifier\HackAST\Token\EqualToken;
use Hackifier\HackAST\Token\InoutToken;
use Hackifier\HackAST\Token\MixedToken;
use Hackifier\HackAST\Trivia\WhiteSpace;
use Hackifier\ITransformer;
use PhpParser\Node;

/**
 * @extends AbstractTransformer<Node\Param>
 */
class ParamTransformer extends AbstractTransformer
{
    /**
     * @param Node\Param   $node
     * @param ITransformer $transformer
     *
     * @return EditableNode
     */
    public function transform($node, ITransformer $transformer): EditableNode
    {
        if (null !== $node->default) {
            $default = $this->list(
                new EqualToken(new WhiteSpace(' '), new WhiteSpace(' ')),
                $transformer->transform($node->default)
            );
        } else {
            $default = Missing();
        }

        if (null !== $node->type) {
            $type = $transformer->transform($node->type);
        } else {
            $type = new MixedToken(Missing(), Missing());
        }

        $type = new SimpleTypeSpecifier($type);

        $type = $this->list(Missing(), $type, new WhiteSpace(' '));

        return new ParameterDeclaration(
          Missing(), // unsupported
          Missing(), // unsupported
          $node->byRef ? new InoutToken(Missing(), new WhiteSpace(' ')) : Missing(),
          $type,
          $transformer->transform($node->var),
          $default
        );
    }

    public function supports(Node $node): bool
    {
        return $node instanceof Node\Param;
    }
}
