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
use Hackifier\HackAST\Token\SemicolonToken;
use Hackifier\HackAST\Trivia\EndOfLine;
use Hackifier\ITransformer;
use Hackifier\Transformer\AbstractTransformer;
use PhpParser\Node;

/**
 * @extends AbstractTransformer<Node\Stmt\Expression>
 */
class ExpressionTransformer extends AbstractTransformer
{
    /**
     * @param Node\Stmt\Expression $node
     * @param ITransformer         $transformer
     *
     * @return EditableNode
     */
    public function transform($node, ITransformer $transformer): EditableNode
    {
        return $this->comments($node, $this->list(
            $transformer->transform($node->expr),
            new SemicolonToken(Missing(), new EndOfLine("\n"))
        ));
    }

    public function supports(Node $node): bool
    {
        return $node instanceof Node\Stmt\Expression;
    }
}
