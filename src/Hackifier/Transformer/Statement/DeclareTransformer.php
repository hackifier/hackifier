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
use Hackifier\HackAST\Missing;
use Hackifier\HackAST\Syntax\BinaryExpression;
use Hackifier\HackAST\Syntax\DeclareDirectiveStatement;
use Hackifier\HackAST\Token\DeclareToken;
use Hackifier\HackAST\Token\EqualToken;
use Hackifier\HackAST\Token\LeftParenToken;
use Hackifier\HackAST\Token\RightParenToken;
use Hackifier\HackAST\Token\SemicolonToken;
use Hackifier\HackAST\Trivia\EndOfLine;
use Hackifier\ITransformer;
use Hackifier\Transformer\AbstractTransformer;
use PhpParser\Node;

/**
 * @extends AbstractTransformer<Node\Stmt\Declare_>
 */
class DeclareTransformer extends AbstractTransformer
{
    /**
     * @param Node\Stmt\Declare_ $node
     * @param ITransformer       $transformer
     *
     * @return EditableNode
     */
    public function transform($node, ITransformer $transformer): EditableNode
    {
        $nodes = [];

        foreach ($node->declares as $declare) {
            if ('strict_types' !== $declare->key->name) {
                $nodes[] = $this->comments($declare, new DeclareDirectiveStatement(
                    new DeclareToken(Missing::getInstance(), Missing::getInstance()),
                    new LeftParenToken(Missing::getInstance(), Missing::getInstance()),
                    new BinaryExpression(
                        $transformer->transform($declare->key),
                        new EqualToken(Missing::getInstance(), Missing::getInstance()),
                        $transformer->transform($declare->value)
                    ),
                    new RightParenToken(Missing::getInstance(), Missing::getInstance()),
                    new SemicolonToken(Missing::getInstance(), new EndOfLine("\n"))
                ));
            }
        }

        return $this->comments($node, $this->list(...$nodes));
    }

    public function supports(Node $node): bool
    {
        return $node instanceof Node\Stmt\Declare_;
    }
}
