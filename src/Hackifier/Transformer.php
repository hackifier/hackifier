<?php

declare(strict_types=1);

/*
 *  Copyright (c) 2019-present, Saif Eddin Gmati.
 *
 *  All rights reserved.
 *
 *  This source code is licensed under the MIT license found in the
 *  LICENSE file in the root directory of this source tree.
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
    public function addStatementTransformer(INodeTransformer $transformer): void
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
