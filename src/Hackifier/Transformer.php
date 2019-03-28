<?php

declare(strict_types=1);

/*
 * This file is part of the Hackifier package.
 *
 * (c) Saif Eddin Gmati <azjezz@protonmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Hackifier;

use Facebook\HHAST\EditableList;
use Facebook\HHAST\EditableNode;
use Hackifier\Transformer\INodeTransformer;
use HH\Lib\Vec;
use PhpParser\Node;

class Transformer implements ITransformer
{
    /**
     * @var array<int, INodeTransformer<Node>>
     */
    private $transformers;

    /**
     * @param array<int, INodeTransformer<Node>> $transformers
     */
    public function __construct(INodeTransformer ...$transformers)
    {
        $this->transformers = $transformers;
    }

    /**
     * @param INodeTransformer<Node> $transformer
     */
    public function addNodeTransformer(INodeTransformer $transformer): void
    {
        $this->transformers[] = $transformer;
    }

    public function transform(Node ...$nodes): EditableList
    {
        $nodes = Vec\map($nodes, function (Node $node): EditableNode {
            return $this->transformNode($node);
        });

        return new EditableList($nodes);
    }

    private function transformNode(Node $node): EditableNode
    {
        foreach ($this->transformers as $transformer) {
            if ($transformer->supports($node)) {
                return $transformer->transform($node, $this);
            }
        }

        throw new Exception\UnsupportedNodeException($node);
    }
}
