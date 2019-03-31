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
use Hackifier\HackAST\Syntax\ElseifClause;
use Hackifier\HackAST\Token\ElseifToken;
use Hackifier\HackAST\Token\LeftBraceToken;
use Hackifier\HackAST\Token\LeftBracketToken;
use Hackifier\HackAST\Token\LeftParenToken;
use Hackifier\HackAST\Token\RightBraceToken;
use Hackifier\HackAST\Token\RightParenToken;
use Hackifier\HackAST\Trivia\EndOfLine;
use Hackifier\HackAST\Trivia\WhiteSpace;
use Hackifier\ITransformer;
use Hackifier\Transformer\AbstractTransformer;
use PhpParser\Node;

/**
 * @extends AbstractTransformer<Node\Stmt\ElseIf_>
 */
class ElseIfTransformer extends AbstractTransformer
{
    /**
     * @param Node\Stmt\ElseIf_ $node
     * @param ITransformer      $transformer
     *
     * @return EditableNode
     */
    public function transform($node, ITransformer $transformer): EditableNode
    {
        $condition = $transformer->transform($node->cond);
        $statements = $transformer->transform(...$node->stmts);

        return $this->comments($node, new ElseifClause(
            new ElseifToken(new WhiteSpace(' '), new WhiteSpace(' ')),
            new LeftParenToken(Missing(), Missing()),
            $condition,
            new RightParenToken(Missing(), new WhiteSpace(' ')),
            $this->list(
                new LeftBraceToken(Missing(), new EndOfLine("\n")),
                $statements,
                new RightBraceToken(Missing(), Missing())
            )
        ));
    }

    public function supports(Node $node): bool
    {
        return $node instanceof Node\Stmt\ElseIf_;
    }
}
