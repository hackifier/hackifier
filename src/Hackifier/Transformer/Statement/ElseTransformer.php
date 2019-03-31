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
use Hackifier\HackAST\Syntax\ElseClause;
use Hackifier\HackAST\Token\ElseToken;
use Hackifier\HackAST\Token\LeftBraceToken;
use Hackifier\HackAST\Token\LeftBracketToken;
use Hackifier\HackAST\Token\RightBraceToken;
use Hackifier\HackAST\Trivia\EndOfLine;
use Hackifier\HackAST\Trivia\WhiteSpace;
use Hackifier\ITransformer;
use Hackifier\Transformer\AbstractTransformer;
use PhpParser\Node;

/**
 * @extends AbstractTransformer<Node\Stmt\Else_>
 */
class ElseTransformer extends AbstractTransformer
{
    /**
     * @param Node\Stmt\Else_ $node
     * @param ITransformer    $transformer
     *
     * @return EditableNode
     */
    public function transform($node, ITransformer $transformer): EditableNode
    {
        $statements = $transformer->transform(...$node->stmts);

        return $this->comments($node, new ElseClause(
            new ElseToken(new WhiteSpace(' '), new WhiteSpace(' ')),
            $this->list(
                new LeftBraceToken(Missing(), new EndOfLine("\n")),
                $statements,
                new RightBraceToken(Missing(), new EndOfLine("\n"))
            )
        ));
    }

    public function supports(Node $node): bool
    {
        return $node instanceof Node\Stmt\Else_;
    }
}
