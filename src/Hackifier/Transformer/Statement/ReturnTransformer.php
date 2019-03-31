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

namespace Hackifier\Transformer\Statement;

use Hackifier\HackAST\EditableNode;
use function Hackifier\HackAST\Missing;
use Hackifier\HackAST\Syntax\ReturnStatement;
use Hackifier\HackAST\Token\ReturnToken;
use Hackifier\HackAST\Token\SemicolonToken;
use Hackifier\HackAST\Trivia\WhiteSpace;
use Hackifier\ITransformer;
use Hackifier\Transformer\AbstractTransformer;
use PhpParser\Node;

/**
 * @extends AbstractTransformer<Node\Stmt\Return_>
 */
class ReturnTransformer extends AbstractTransformer
{
    /**
     * @param Node\Stmt\Return_ $node
     * @param ITransformer      $transformer
     *
     * @return EditableNode
     */
    public function transform($node, ITransformer $transformer): EditableNode
    {
        if (null === $node->expr) {
            $expression = Missing();
        } else {
            $expression = $transformer->transform($node->expr);
        }

        return new ReturnStatement(
            new ReturnToken(Missing(), new WhiteSpace(' ')),
            $expression,
            new SemicolonToken(Missing(), Missing())
        );
    }

    public function supports(Node $node): bool
    {
        return $node instanceof Node\Stmt\Return_;
    }
}
