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
final class BinaryExpression extends EditableNode
{
    /**
     * @var EditableNode
     */
    private $_left_operand;

    /**
     * @var EditableNode
     */
    private $_operator;

    /**
     * @var EditableNode
     */
    private $_right_operand;

    public function __construct(EditableNode $left_operand, EditableNode $operator, EditableNode $right_operand)
    {
        parent::__construct('binary_expression');
        $this->_left_operand = $left_operand;
        $this->_operator = $operator;
        $this->_right_operand = $right_operand;
    }

    /**
     * @return array<string, EditableNode>
     */
    public function getChildren(): array
    {
        return ['left_operand' => $this->_left_operand, 'operator' => $this->_operator, 'right_operand' => $this->_right_operand];
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
        $left_operand = $this->_left_operand->rewrite($rewriter, $parents);
        $operator = $this->_operator->rewrite($rewriter, $parents);
        $right_operand = $this->_right_operand->rewrite($rewriter, $parents);

        if ($left_operand === $this->_left_operand && $operator === $this->_operator && $right_operand === $this->_right_operand) {
            return $this;
        }

        return new static($left_operand, $operator, $right_operand);
    }

    public function hasLeftOperand(): bool
    {
        return !$this->_left_operand->isMissing();
    }

    public function withLeftOperand(EditableNode $value): self
    {
        if ($value === $this->_left_operand) {
            return $this;
        }

        return new static($value, $this->_operator, $this->_right_operand);
    }

    public function getLeftOperand(): EditableNode
    {
        return $this->_left_operand;
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

        return new static($this->_left_operand, $value, $this->_right_operand);
    }

    public function getOperator(): EditableNode
    {
        return $this->_operator;
    }

    public function hasRightOperand(): bool
    {
        return !$this->_right_operand->isMissing();
    }

    public function withRightOperand(EditableNode $value): self
    {
        if ($value === $this->_right_operand) {
            return $this;
        }

        return new static($this->_left_operand, $this->_operator, $value);
    }

    public function getRightOperand(): EditableNode
    {
        return $this->_right_operand;
    }
}
