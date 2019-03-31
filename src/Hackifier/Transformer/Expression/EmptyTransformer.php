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
use Hackifier\HackAST\Syntax\EmptyExpression;
use Hackifier\HackAST\Token\EmptyToken;
use Hackifier\HackAST\Token\LeftParenToken;
use Hackifier\HackAST\Token\RightParenToken;
use Hackifier\ITransformer;
use Hackifier\Transformer\AbstractTransformer;
use PhpParser\Node;

/**
 * @extends AbstractTransformer<Node\Expr\Empty_>
 */
class EmptyTransformer extends AbstractTransformer
{

    /**
     * @param Node\Expr\Empty_ $node
     * @param ITransformer $transformer
     *
     * @return EditableNode
     */
    public function transform($node, ITransformer $transformer): EditableNode
    {
        return $this->comments($node, new EmptyExpression(
            new EmptyToken(Missing(), Missing()),
            new LeftParenToken(Missing(), Missing()),
            $transformer->transform($node->expr),
            new RightParenToken(Missing(), Missing())
        ));
    }

    public function supports(Node $node): bool
    {
        return $node instanceof Node\Expr\Empty_;
    }
}