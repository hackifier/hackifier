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

use Hackifier\Exception\OverflowException;
use Hackifier\HackAST\EditableList;
use Hackifier\HackAST\EditableNode;
use Hackifier\Processor\IPostProcessor;
use Hackifier\Processor\IPreProcessor;
use Hackifier\Transformer\INodeTransformer;
use PhpParser\Node;
use SplPriorityQueue;

class Transformer implements ITransformer
{
    /**
     * @var SplPriorityQueue
     */
    private $transformers;

    /**
     * @var int
     */
    private $depth = 0;

    /**
     * @var int
     */
    private $maxDepthLevel;

    /**
     * @var SplPriorityQueue
     */
    private $postProcessors;

    /**
     * @var SplPriorityQueue
     */
    private $preProcessors;

    /**
     * Transformer constructor.
     *
     * @param int $maxDepthLevel - maximum depth level. if the level is reached, an overflow exception will be throw.
     *                           negative value means no max depth level.
     */
    public function __construct(int $maxDepthLevel = 10000)
    {
        $this->transformers = new SplPriorityQueue();
        $this->preProcessors = new SplPriorityQueue();
        $this->postProcessors = new SplPriorityQueue();
        $this->maxDepthLevel = $maxDepthLevel;
    }

    /**
     * @param INodeTransformer<Node> $transformer
     * @param int                    $priority
     *
     * @return Transformer
     */
    public function addNodeTransformer(INodeTransformer $transformer, int $priority = 0): self
    {
        $this->transformers->insert($transformer, $priority);

        return $this;
    }

    public function addPostProcessor(IPostProcessor $processor, int $priority = 0): self
    {
        $this->postProcessors->insert($processor, $priority);

        return $this;
    }

    public function addPreProcessor(IPreProcessor $processor, int $priority = 0): self
    {
        $this->preProcessors->insert($processor, $priority);

        return $this;
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
        /**
         * @var INodeTransformer<Node>
         */
        foreach ($transformers as $transformer) {
            if ($transformer->supports($node)) {
                if ($this->depth === $this->maxDepthLevel) {
                    throw new OverflowException('Max depth level reached.');
                }
                ++$this->depth;

                foreach ($this->preProcessors as $processor) {
                    $node = $processor->process($node, $this->depth);
                }

                $editable = $transformer->transform($node, $this);

                foreach ($this->postProcessors as $processor) {
                    $editable = $processor->process($node, $editable, $this->depth);
                }

                --$this->depth;

                return $editable;
            }
        }

        throw new Exception\UnsupportedNodeException($node);
    }
}
