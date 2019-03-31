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
use Hackifier\ITransformer;
use Hackifier\Transformer\AbstractTransformer;
use PhpParser\Node;

/**
 * @extends AbstractTransformer<Node\Expr\ConstFetch>
 */
class ConstantFetchTransformer extends AbstractTransformer
{
    /**
     * @param Node\Expr\ConstFetch $node
     * @param ITransformer         $transformer
     *
     * @return EditableNode
     */
    public function transform($node, ITransformer $transformer): EditableNode
    {
        return $this->comments($node, $transformer->transform($node->name));
    }

    public function supports(Node $node): bool
    {
        return $node instanceof Node\Expr\ConstFetch;
    }
}
