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
use Hackifier\HackAST\Syntax\BinaryExpression;
use Hackifier\HackAST\Token\ColonToken;
use Hackifier\HackAST\Token\QuestionColonToken;
use Hackifier\HackAST\Token\QuestionToken;
use Hackifier\HackAST\Trivia\WhiteSpace;
use Hackifier\ITransformer;
use Hackifier\Transformer\AbstractTransformer;
use PhpParser\Node;

/**
 * @extends AbstractTransformer<Node\Expr\Ternary>
 */
class TernaryTransformer extends AbstractTransformer
{
    /**
     * @param Node\Expr\Ternary $node
     * @param ITransformer      $transformer
     *
     * @return EditableNode
     */
    public function transform($node, ITransformer $transformer): EditableNode
    {
        $condition = $transformer->transform($node->cond);
        $else = $transformer->transform($node->else);

        if (null === $node->if) {
            return $this->comments($node, new BinaryExpression(
                $condition,
                new QuestionColonToken(new WhiteSpace(' '), new WhiteSpace(' ')),
                $else
            ));
        }

        $if = $transformer->transform($node->if);

        return $this->comments($node, new BinaryExpression(
           $condition,
           new QuestionToken(new WhiteSpace(' '), new WhiteSpace(' ')),
           new BinaryExpression(
               $if,
               new ColonToken(new WhiteSpace(' '), new WhiteSpace(' ')),
               $else
           )
        ));
    }

    public function supports(Node $node): bool
    {
        return $node instanceof Node\Expr\Ternary;
    }
}
