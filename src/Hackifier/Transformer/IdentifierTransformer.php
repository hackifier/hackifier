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
use Hackifier\HackAST\Token;
use Hackifier\HackAST\Token\NameToken;
use Hackifier\ITransformer;
use PhpParser\Node;

/**
 * @extends AbstractTransformer<Node\Identifier>
 */
class IdentifierTransformer extends AbstractTransformer
{
    /**
     * @param Node\Identifier $node
     * @param ITransformer    $transformer
     *
     * @return EditableNode
     */
    public function transform($node, ITransformer $transformer): EditableNode
    {
        if ('abstract' === $node->name) {
            return $this->comments($node, new Token\AbstractToken(Missing(), Missing()));
        }

        if ('and' === $node->name) {
            return $this->comments($node, new Token\AndToken(Missing(), Missing()));
        }

        if ('array' === $node->name) {
            return $this->comments($node, new Token\ArrayToken(Missing(), Missing()));
        }

        if ('arraykey' === $node->name) {
            return $this->comments($node, new Token\ArraykeyToken(Missing(), Missing()));
        }

        if ('as' === $node->name) {
            return $this->comments($node, new Token\AsToken(Missing(), Missing()));
        }

        if ('async' === $node->name) {
            return $this->comments($node, new Token\AsyncToken(Missing(), Missing()));
        }

        if ('attribute' === $node->name) {
            return $this->comments($node, new Token\AttributeToken(Missing(), Missing()));
        }

        if ('await' === $node->name) {
            return $this->comments($node, new Token\AwaitToken(Missing(), Missing()));
        }

        if ('binary' === $node->name) {
            return $this->comments($node, new Token\BinaryToken(Missing(), Missing()));
        }

        if ('bool' === $node->name) {
            return $this->comments($node, new Token\BoolToken(Missing(), Missing()));
        }

        if ('boolean' === $node->name) {
            return $this->comments($node, new Token\BooleanToken(Missing(), Missing()));
        }

        if ('break' === $node->name) {
            return $this->comments($node, new Token\BreakToken(Missing(), Missing()));
        }

        if ('case' === $node->name) {
            return $this->comments($node, new Token\CaseToken(Missing(), Missing()));
        }

        if ('catch' === $node->name) {
            return $this->comments($node, new Token\CatchToken(Missing(), Missing()));
        }

        if ('category' === $node->name) {
            return $this->comments($node, new Token\CategoryToken(Missing(), Missing()));
        }

        if ('children' === $node->name) {
            return $this->comments($node, new Token\ChildrenToken(Missing(), Missing()));
        }

        if ('class' === $node->name) {
            return $this->comments($node, new Token\ClassToken(Missing(), Missing()));
        }

        if ('classname' === $node->name) {
            return $this->comments($node, new Token\ClassnameToken(Missing(), Missing()));
        }

        if ('clone' === $node->name) {
            return $this->comments($node, new Token\CloneToken(Missing(), Missing()));
        }

        if ('const' === $node->name) {
            return $this->comments($node, new Token\ConstToken(Missing(), Missing()));
        }

        if ('continue' === $node->name) {
            return $this->comments($node, new Token\ContinueToken(Missing(), Missing()));
        }

        if ('coroutine' === $node->name) {
            return $this->comments($node, new Token\CoroutineToken(Missing(), Missing()));
        }

        if ('darray' === $node->name) {
            return $this->comments($node, new Token\DarrayToken(Missing(), Missing()));
        }

        if ('declare' === $node->name) {
            return $this->comments($node, new Token\DeclareToken(Missing(), Missing()));
        }

        if ('default' === $node->name) {
            return $this->comments($node, new Token\DefaultToken(Missing(), Missing()));
        }

        if ('define' === $node->name) {
            return $this->comments($node, new Token\DefineToken(Missing(), Missing()));
        }

        if ('dict' === $node->name) {
            return $this->comments($node, new Token\DictToken(Missing(), Missing()));
        }

        if ('do' === $node->name) {
            return $this->comments($node, new Token\DoToken(Missing(), Missing()));
        }

        if ('double' === $node->name) {
            return $this->comments($node, new Token\DoubleToken(Missing(), Missing()));
        }

        if ('echo' === $node->name) {
            return $this->comments($node, new Token\EchoToken(Missing(), Missing()));
        }

        if ('else' === $node->name) {
            return $this->comments($node, new Token\ElseToken(Missing(), Missing()));
        }

        if ('elseif' === $node->name) {
            return $this->comments($node, new Token\ElseifToken(Missing(), Missing()));
        }

        if ('empty' === $node->name) {
            return $this->comments($node, new Token\EmptyToken(Missing(), Missing()));
        }

        if ('endfor' === $node->name) {
            return $this->comments($node, new Token\EndforToken(Missing(), Missing()));
        }

        if ('endforeach' === $node->name) {
            return $this->comments($node, new Token\EndforeachToken(Missing(), Missing()));
        }

        if ('enddeclare' === $node->name) {
            return $this->comments($node, new Token\EnddeclareToken(Missing(), Missing()));
        }

        if ('endif' === $node->name) {
            return $this->comments($node, new Token\EndifToken(Missing(), Missing()));
        }

        if ('endswitch' === $node->name) {
            return $this->comments($node, new Token\EndswitchToken(Missing(), Missing()));
        }

        if ('endwhile' === $node->name) {
            return $this->comments($node, new Token\EndwhileToken(Missing(), Missing()));
        }

        if ('enum' === $node->name) {
            return $this->comments($node, new Token\EnumToken(Missing(), Missing()));
        }

        if ('eval' === $node->name) {
            return $this->comments($node, new Token\EvalToken(Missing(), Missing()));
        }

        if ('extends' === $node->name) {
            return $this->comments($node, new Token\ExtendsToken(Missing(), Missing()));
        }

        if ('fallthrough' === $node->name) {
            return $this->comments($node, new Token\FallthroughToken(Missing(), Missing()));
        }

        if ('float' === $node->name) {
            return $this->comments($node, new Token\FloatToken(Missing(), Missing()));
        }

        if ('file' === $node->name) {
            return $this->comments($node, new Token\FileToken(Missing(), Missing()));
        }

        if ('final' === $node->name) {
            return $this->comments($node, new Token\FinalToken(Missing(), Missing()));
        }

        if ('finally' === $node->name) {
            return $this->comments($node, new Token\FinallyToken(Missing(), Missing()));
        }

        if ('for' === $node->name) {
            return $this->comments($node, new Token\ForToken(Missing(), Missing()));
        }

        if ('foreach' === $node->name) {
            return $this->comments($node, new Token\ForeachToken(Missing(), Missing()));
        }

        if ('from' === $node->name) {
            return $this->comments($node, new Token\FromToken(Missing(), Missing()));
        }

        if ('function' === $node->name) {
            return $this->comments($node, new Token\FunctionToken(Missing(), Missing()));
        }

        if ('global' === $node->name) {
            return $this->comments($node, new Token\GlobalToken(Missing(), Missing()));
        }

        if ('concurrent' === $node->name) {
            return $this->comments($node, new Token\ConcurrentToken(Missing(), Missing()));
        }

        if ('goto' === $node->name) {
            return $this->comments($node, new Token\GotoToken(Missing(), Missing()));
        }

        if ('if' === $node->name) {
            return $this->comments($node, new Token\IfToken(Missing(), Missing()));
        }

        if ('implements' === $node->name) {
            return $this->comments($node, new Token\ImplementsToken(Missing(), Missing()));
        }

        if ('include' === $node->name) {
            return $this->comments($node, new Token\IncludeToken(Missing(), Missing()));
        }

        if ('inout' === $node->name) {
            return $this->comments($node, new Token\InoutToken(Missing(), Missing()));
        }

        if ('instanceof' === $node->name) {
            return $this->comments($node, new Token\InstanceofToken(Missing(), Missing()));
        }

        if ('insteadof' === $node->name) {
            return $this->comments($node, new Token\InsteadofToken(Missing(), Missing()));
        }

        if ('int' === $node->name) {
            return $this->comments($node, new Token\IntToken(Missing(), Missing()));
        }

        if ('integer' === $node->name) {
            return $this->comments($node, new Token\IntegerToken(Missing(), Missing()));
        }

        if ('interface' === $node->name) {
            return $this->comments($node, new Token\InterfaceToken(Missing(), Missing()));
        }

        if ('is' === $node->name) {
            return $this->comments($node, new Token\IsToken(Missing(), Missing()));
        }

        if ('isset' === $node->name) {
            return $this->comments($node, new Token\IssetToken(Missing(), Missing()));
        }

        if ('keyset' === $node->name) {
            return $this->comments($node, new Token\KeysetToken(Missing(), Missing()));
        }

        if ('let' === $node->name) {
            return $this->comments($node, new Token\LetToken(Missing(), Missing()));
        }

        if ('list' === $node->name) {
            return $this->comments($node, new Token\ListToken(Missing(), Missing()));
        }

        if ('mixed' === $node->name) {
            return $this->comments($node, new Token\MixedToken(Missing(), Missing()));
        }

        if ('namespace' === $node->name) {
            return $this->comments($node, new Token\NamespaceToken(Missing(), Missing()));
        }

        if ('new' === $node->name) {
            return $this->comments($node, new Token\NewToken(Missing(), Missing()));
        }

        if ('newtype' === $node->name) {
            return $this->comments($node, new Token\NewtypeToken(Missing(), Missing()));
        }

        if ('noreturn' === $node->name) {
            return $this->comments($node, new Token\NoreturnToken(Missing(), Missing()));
        }

        if ('num' === $node->name) {
            return $this->comments($node, new Token\NumToken(Missing(), Missing()));
        }

        if ('object' === $node->name) {
            return $this->comments($node, new Token\ObjectToken(Missing(), Missing()));
        }

        if ('or' === $node->name) {
            return $this->comments($node, new Token\OrToken(Missing(), Missing()));
        }

        if ('parent' === $node->name) {
            return $this->comments($node, new Token\ParentToken(Missing(), Missing()));
        }

        if ('print' === $node->name) {
            return $this->comments($node, new Token\PrintToken(Missing(), Missing()));
        }

        if ('private' === $node->name) {
            return $this->comments($node, new Token\PrivateToken(Missing(), Missing()));
        }

        if ('protected' === $node->name) {
            return $this->comments($node, new Token\ProtectedToken(Missing(), Missing()));
        }

        if ('public' === $node->name) {
            return $this->comments($node, new Token\PublicToken(Missing(), Missing()));
        }

        if ('real' === $node->name) {
            return $this->comments($node, new Token\RealToken(Missing(), Missing()));
        }

        if ('reify' === $node->name) {
            return $this->comments($node, new Token\ReifyToken(Missing(), Missing()));
        }

        if ('require' === $node->name) {
            return $this->comments($node, new Token\RequireToken(Missing(), Missing()));
        }

        if ('required' === $node->name) {
            return $this->comments($node, new Token\RequiredToken(Missing(), Missing()));
        }

        if ('resource' === $node->name) {
            return $this->comments($node, new Token\ResourceToken(Missing(), Missing()));
        }

        if ('return' === $node->name) {
            return $this->comments($node, new Token\ReturnToken(Missing(), Missing()));
        }

        if ('self' === $node->name) {
            return $this->comments($node, new Token\SelfToken(Missing(), Missing()));
        }

        if ('shape' === $node->name) {
            return $this->comments($node, new Token\ShapeToken(Missing(), Missing()));
        }

        if ('static' === $node->name) {
            return $this->comments($node, new Token\StaticToken(Missing(), Missing()));
        }

        if ('string' === $node->name) {
            return $this->comments($node, new Token\StringToken(Missing(), Missing()));
        }

        if ('super' === $node->name) {
            return $this->comments($node, new Token\SuperToken(Missing(), Missing()));
        }

        if ('suspend' === $node->name) {
            return $this->comments($node, new Token\SuspendToken(Missing(), Missing()));
        }

        if ('switch' === $node->name) {
            return $this->comments($node, new Token\SwitchToken(Missing(), Missing()));
        }

        if ('this' === $node->name) {
            return $this->comments($node, new Token\ThisToken(Missing(), Missing()));
        }

        if ('throw' === $node->name) {
            return $this->comments($node, new Token\ThrowToken(Missing(), Missing()));
        }

        if ('trait' === $node->name) {
            return $this->comments($node, new Token\TraitToken(Missing(), Missing()));
        }

        if ('try' === $node->name) {
            return $this->comments($node, new Token\TryToken(Missing(), Missing()));
        }

        if ('tuple' === $node->name) {
            return $this->comments($node, new Token\TupleToken(Missing(), Missing()));
        }

        if ('type' === $node->name) {
            return $this->comments($node, new Token\TypeToken(Missing(), Missing()));
        }

        if ('unset' === $node->name) {
            return $this->comments($node, new Token\UnsetToken(Missing(), Missing()));
        }

        if ('use' === $node->name) {
            return $this->comments($node, new Token\UseToken(Missing(), Missing()));
        }

        if ('using' === $node->name) {
            return $this->comments($node, new Token\UsingToken(Missing(), Missing()));
        }

        if ('var' === $node->name) {
            return $this->comments($node, new Token\VarToken(Missing(), Missing()));
        }

        if ('varray' === $node->name) {
            return $this->comments($node, new Token\VarrayToken(Missing(), Missing()));
        }

        if ('vec' === $node->name) {
            return $this->comments($node, new Token\VecToken(Missing(), Missing()));
        }

        if ('void' === $node->name) {
            return $this->comments($node, new Token\VoidToken(Missing(), Missing()));
        }

        if ('where' === $node->name) {
            return $this->comments($node, new Token\WhereToken(Missing(), Missing()));
        }

        if ('while' === $node->name) {
            return $this->comments($node, new Token\WhileToken(Missing(), Missing()));
        }

        if ('xor' === $node->name) {
            return $this->comments($node, new Token\XorToken(Missing(), Missing()));
        }

        if ('yield' === $node->name) {
            return $this->comments($node, new Token\YieldToken(Missing(), Missing()));
        }

        if ('null' === $node->name) {
            return $this->comments($node, new Token\NullLiteralToken(Missing(), Missing()));
        }

        return $this->comments($node, new NameToken(Missing(), Missing(), $node->name));
    }

    public function supports(Node $node): bool
    {
        return $node instanceof Node\Identifier;
    }
}
