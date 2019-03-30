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

namespace Hackifier\HackAST\Syntax;

use Hackifier\HackAST\EditableNode;

/**
 * This class is generated. Do not modify it manually!
 *
 * @version 2018-11-27-0001
 */
final class SubscriptExpression extends EditableNode
{
    /**
     * @var EditableNode
     */
    private $_receiver;

    /**
     * @var EditableNode
     */
    private $_left_bracket;

    /**
     * @var EditableNode
     */
    private $_index;

    /**
     * @var EditableNode
     */
    private $_right_bracket;

    public function __construct(EditableNode $receiver, EditableNode $left_bracket, EditableNode $index, EditableNode $right_bracket)
    {
        parent::__construct('subscript_expression');
        $this->_receiver = $receiver;
        $this->_left_bracket = $left_bracket;
        $this->_index = $index;
        $this->_right_bracket = $right_bracket;
    }

    /**
     * @return array<string, EditableNode>
     */
    public function getChildren(): array
    {
        return ['receiver' => $this->_receiver, 'left_bracket' => $this->_left_bracket, 'index' => $this->_index, 'right_bracket' => $this->_right_bracket];
    }

    /**
     * @param mixed                         $rewriter
     * @param array<int, EditableNode>|null $parents
     *
     * @return static
     */
    public function rewriteDescendants($rewriter, ?array $parents = null): self
    {
        $parents = $parents ?? [];
        $parents[] = $this;
        $receiver = $this->_receiver->rewrite($rewriter, $parents);
        $left_bracket = $this->_left_bracket->rewrite($rewriter, $parents);
        $index = $this->_index->rewrite($rewriter, $parents);
        $right_bracket = $this->_right_bracket->rewrite($rewriter, $parents);

        if ($receiver === $this->_receiver && $left_bracket === $this->_left_bracket && $index === $this->_index && $right_bracket === $this->_right_bracket) {
            return $this;
        }

        return new static($receiver, $left_bracket, $index, $right_bracket);
    }

    public function hasReceiver(): bool
    {
        return !$this->_receiver->isMissing();
    }

    public function withReceiver(EditableNode $value): self
    {
        if ($value === $this->_receiver) {
            return $this;
        }

        return new static($value, $this->_left_bracket, $this->_index, $this->_right_bracket);
    }

    public function getReceiver(): EditableNode
    {
        return $this->_receiver;
    }

    public function hasLeftBracket(): bool
    {
        return !$this->_left_bracket->isMissing();
    }

    public function withLeftBracket(EditableNode $value): self
    {
        if ($value === $this->_left_bracket) {
            return $this;
        }

        return new static($this->_receiver, $value, $this->_index, $this->_right_bracket);
    }

    public function getLeftBracket(): EditableNode
    {
        return $this->_left_bracket;
    }

    public function hasIndex(): bool
    {
        return !$this->_index->isMissing();
    }

    public function withIndex(EditableNode $value): self
    {
        if ($value === $this->_index) {
            return $this;
        }

        return new static($this->_receiver, $this->_left_bracket, $value, $this->_right_bracket);
    }

    public function getIndex(): EditableNode
    {
        return $this->_index;
    }

    public function hasRightBracket(): bool
    {
        return !$this->_right_bracket->isMissing();
    }

    public function withRightBracket(EditableNode $value): self
    {
        if ($value === $this->_right_bracket) {
            return $this;
        }

        return new static($this->_receiver, $this->_left_bracket, $this->_index, $value);
    }

    public function getRightBracket(): EditableNode
    {
        return $this->_right_bracket;
    }
}
