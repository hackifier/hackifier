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
use Hackifier\HackAST\EditableToken;
use function Hackifier\HackAST\Missing;
use Hackifier\HackAST\Syntax\VariableExpression;
use Hackifier\HackAST\Token\DollarToken;
use Hackifier\HackAST\Token\NameToken;
use Hackifier\HackAST\Token\VariableToken;
use Hackifier\ITransformer;
use Hackifier\Transformer\AbstractTransformer;
use PhpParser\Node;

/**
 * @extends AbstractTransformer<Node\Expr\Variable>
 */
class VariableTransformer extends AbstractTransformer
{
    /**
     * @param Node\Expr\Variable $node
     * @param ITransformer       $transformer
     *
     * @return EditableNode
     */
    public function transform($node, ITransformer $transformer): EditableNode
    {
        $name = $node->name instanceof Node ? $transformer->transform($node->name)->getCode() : $node->name;

        $variable = new VariableExpression(
            new VariableToken(
                new DollarToken(Missing(), Missing()),
                Missing(),
                $name
            )
        );

        return $this->comments($node, $variable);
    }

    public function supports(Node $node): bool
    {
        return $node instanceof Node\Expr\Variable;
    }
}
