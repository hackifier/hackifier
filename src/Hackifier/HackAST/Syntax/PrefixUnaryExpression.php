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
final class PrefixUnaryExpression extends EditableNode
{
    /**
     * @var EditableNode
     */
    private $_operator;

    /**
     * @var EditableNode
     */
    private $_operand;

    public function __construct(EditableNode $operator, EditableNode $operand)
    {
        parent::__construct('prefix_unary_expression');
        $this->_operator = $operator;
        $this->_operand = $operand;
    }

    /**
     * @return array<string, EditableNode>
     */
    public function getChildren(): array
    {
        return ['operator' => $this->_operator, 'operand' => $this->_operand];
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
        $operator = $this->_operator->rewrite($rewriter, $parents);
        $operand = $this->_operand->rewrite($rewriter, $parents);

        if ($operator === $this->_operator && $operand === $this->_operand) {
            return $this;
        }

        return new static($operator, $operand);
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

        return new static($value, $this->_operand);
    }

    public function getOperator(): EditableNode
    {
        return $this->_operator;
    }

    public function hasOperand(): bool
    {
        return !$this->_operand->isMissing();
    }

    public function withOperand(EditableNode $value): self
    {
        if ($value === $this->_operand) {
            return $this;
        }

        return new static($this->_operator, $value);
    }

    public function getOperand(): EditableNode
    {
        return $this->_operand;
    }
}
