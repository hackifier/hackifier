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

namespace Hackifier\Transformer\Scalar;

use Hackifier\HackAST\EditableNode;
use function Hackifier\HackAST\Missing;
use Hackifier\HackAST\Token\DoubleQuotedStringLiteralHeadToken;
use Hackifier\HackAST\Token\DoubleQuotedStringLiteralTailToken;
use Hackifier\HackAST\Token\SingleQuotedStringLiteralToken;
use Hackifier\ITransformer;
use Hackifier\Transformer\AbstractTransformer;
use PhpParser\Node;

/**
 * @extends AbstractTransformer<Node\Scalar\String_>
 */
class LiteralStringTransformer extends AbstractTransformer
{
    /**
     * @param Node\Scalar\String_ $node
     * @param ITransformer        $transformer
     *
     * @return EditableNode
     */
    public function transform($node, ITransformer $transformer): EditableNode
    {
        return $this->comments($node, new SingleQuotedStringLiteralToken(
            new DoubleQuotedStringLiteralHeadToken(Missing(), Missing(), '\''),
            new DoubleQuotedStringLiteralTailToken(Missing(), Missing(), '\''),
            $node->value
        ));
    }

    public function supports(Node $node): bool
    {
        return $node instanceof Node\Scalar\String_;
    }
}
