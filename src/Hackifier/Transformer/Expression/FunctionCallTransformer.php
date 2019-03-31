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

namespace Hackifier\Transformer\Expression;

use Hackifier\HackAST\EditableNode;
use function Hackifier\HackAST\Missing;
use Hackifier\HackAST\Syntax\FunctionCallExpression;
use Hackifier\HackAST\Token\CommaToken;
use Hackifier\HackAST\Token\LeftParenToken;
use Hackifier\HackAST\Token\RightParenToken;
use Hackifier\HackAST\Trivia\WhiteSpace;
use Hackifier\ITransformer;
use Hackifier\Transformer\AbstractTransformer;
use PhpParser\Node;

/**
 * @extends AbstractTransformer<Node\Expr\FuncCall>
 */
class FunctionCallTransformer extends AbstractTransformer
{
    /**
     * @param Node\Expr\FuncCall $node
     * @param ITransformer       $transformer
     *
     * @return EditableNode
     */
    public function transform($node, ITransformer $transformer): EditableNode
    {
        $args = [];
        $last = count($node->args) - 1;

        foreach ($node->args as $i => $arg) {
            $args[] = $transformer->transform($arg);

            if ($i !== $last) {
                $args[] = new CommaToken(Missing(), new WhiteSpace(' '));
            }
        }

        return $this->comments($node, new FunctionCallExpression(
            $transformer->transform($node->name),
            new LeftParenToken(Missing(), Missing()),
            $this->list(...$args),
            new RightParenToken(Missing(), Missing())
        ));
    }

    public function supports(Node $node): bool
    {
        return $node instanceof Node\Expr\FuncCall;
    }
}
