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

namespace Hackifier\Transformer;

use Hackifier\HackAST\EditableNode;
use function Hackifier\HackAST\Missing;
use Hackifier\HackAST\Syntax\QualifiedName;
use Hackifier\HackAST\Token\NameToken;
use Hackifier\ITransformer;
use PhpParser\Node;

/**
 * @extends AbstractTransformer<Node\Name>
 */
class NameTransformer extends AbstractTransformer
{
    /**
     * @param Node\Name    $node
     * @param ITransformer $transformer
     *
     * @return EditableNode
     */
    public function transform($node, ITransformer $transformer): EditableNode
    {
        $parts = [];

        foreach ($node->parts as $part) {
            $parts[] = new NameToken(Missing(), Missing(), $part);
        }

        return $this->comments($node, new QualifiedName($this->list(...$parts)));
    }

    public function supports(Node $node): bool
    {
        return $node instanceof Node\Name;
    }
}
