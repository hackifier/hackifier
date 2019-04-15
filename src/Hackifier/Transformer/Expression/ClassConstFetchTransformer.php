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
use Hackifier\HackAST\Token\ColonColonToken;
use Hackifier\ITransformer;
use Hackifier\Transformer\AbstractTransformer;
use PhpParser\Node;

/**
 * @extends AbstractTransformer<Node\Expr\ClassConstFetch>
 */
class ClassConstFetchTransformer extends AbstractTransformer
{

    /**
     * @param Node\Expr\ClassConstFetch $node
     * @param ITransformer $transformer
     *
     * @return EditableNode
     */
    public function transform($node, ITransformer $transformer): EditableNode
    {
        return $this->comments($node, new ColonColonToken(
            $transformer->transform($node->class),
            $transformer->transform($node->name)
        ));
    }

    public function supports(Node $node): bool
    {
        return $node instanceof Node\Expr\ClassConstFetch;
    }
}