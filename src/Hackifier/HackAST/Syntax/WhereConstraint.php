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
final class WhereConstraint extends EditableNode
{
    /**
     * @var EditableNode
     */
    private $_left_type;

    /**
     * @var EditableNode
     */
    private $_operator;

    /**
     * @var EditableNode
     */
    private $_right_type;

    public function __construct(EditableNode $left_type, EditableNode $operator, EditableNode $right_type)
    {
        parent::__construct('where_constraint');
        $this->_left_type = $left_type;
        $this->_operator = $operator;
        $this->_right_type = $right_type;
    }

    /**
     * @return array<string, EditableNode>
     */
    public function getChildren(): array
    {
        return ['left_type' => $this->_left_type, 'operator' => $this->_operator, 'right_type' => $this->_right_type];
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
        $left_type = $this->_left_type->rewrite($rewriter, $parents);
        $operator = $this->_operator->rewrite($rewriter, $parents);
        $right_type = $this->_right_type->rewrite($rewriter, $parents);

        if ($left_type === $this->_left_type && $operator === $this->_operator && $right_type === $this->_right_type) {
            return $this;
        }

        return new static($left_type, $operator, $right_type);
    }

    public function hasLeftType(): bool
    {
        return !$this->_left_type->isMissing();
    }

    public function withLeftType(EditableNode $value): self
    {
        if ($value === $this->_left_type) {
            return $this;
        }

        return new static($value, $this->_operator, $this->_right_type);
    }

    public function getLeftType(): EditableNode
    {
        return $this->_left_type;
    }

    public function hasOperator(): bool
    {
        return !$this->_operator->isMissing();
    }

    public function withOperator(EditableNode $value): self
    {
        if ($value === $this->_operator) {
            return $this;
        }

        return new static($this->_left_type, $value, $this->_right_type);
    }

    public function getOperator(): EditableNode
    {
        return $this->_operator;
    }

    public function hasRightType(): bool
    {
        return !$this->_right_type->isMissing();
    }

    public function withRightType(EditableNode $value): self
    {
        if ($value === $this->_right_type) {
            return $this;
        }

        return new static($this->_left_type, $this->_operator, $value);
    }

    public function getRightType(): EditableNode
    {
        return $this->_right_type;
    }
}
