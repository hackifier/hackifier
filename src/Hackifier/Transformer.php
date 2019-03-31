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

namespace Hackifier;

use Hackifier\HackAST\EditableList;
use Hackifier\HackAST\EditableNode;
use Hackifier\Transformer\INodeTransformer;
use PhpParser\Node;
use SplPriorityQueue;

class Transformer implements ITransformer
{
    /**
     * @var SplPriorityQueue
     */
    private $transformers;

    public function __construct()
    {
        $this->transformers = new SplPriorityQueue();
    }

    /**
     * @param INodeTransformer<Node> $transformer
     * @param int                    $priority
     */
    public function addNodeTransformer(INodeTransformer $transformer, int $priority = 0): void
    {
        $this->transformers->insert($transformer, $priority);
    }

    public function transform(Node ...$nodes): EditableNode
    {
        $nodes = array_map(function (Node $node): EditableNode {
            return $this->transformNode($node);
        }, $nodes);

        return new EditableList($nodes);
    }

    private function transformNode(Node $node): EditableNode
    {
        $transformers = clone $this->transformers;

        foreach ($transformers as $transformer) {
            if ($transformer->supports($node)) {
                return $transformer->transform($node, $this);
            }
        }

        throw new Exception\UnsupportedNodeException($node);
    }
}
