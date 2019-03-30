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
final class PostfixUnaryExpression extends EditableNode
{
    /**
     * @var EditableNode
     */
    private $_operand;

    /**
     * @var EditableNode
     */
    private $_operator;

    public function __construct(EditableNode $operand, EditableNode $operator)
    {
        parent::__construct('postfix_unary_expression');
        $this->_operand = $operand;
        $this->_operator = $operator;
    }

    /**
     * @return array<string, EditableNode>
     */
    public function getChildren(): array
    {
        return ['operand' => $this->_operand, 'operator' => $this->_operator];
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
        $operand = $this->_operand->rewrite($rewriter, $parents);
        $operator = $this->_operator->rewrite($rewriter, $parents);

        if ($operand === $this->_operand && $operator === $this->_operator) {
            return $this;
        }

        return new static($operand, $operator);
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

        return new static($value, $this->_operator);
    }

    public function getOperand(): EditableNode
    {
        return $this->_operand;
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

        return new static($this->_operand, $value);
    }

    public function getOperator(): EditableNode
    {
        return $this->_operator;
    }
}
