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
final class XHPSpreadAttribute extends EditableNode
{
    /**
     * @var EditableNode
     */
    private $_left_brace;

    /**
     * @var EditableNode
     */
    private $_spread_operator;

    /**
     * @var EditableNode
     */
    private $_expression;

    /**
     * @var EditableNode
     */
    private $_right_brace;

    public function __construct(EditableNode $left_brace, EditableNode $spread_operator, EditableNode $expression, EditableNode $right_brace)
    {
        parent::__construct('xhp_spread_attribute');
        $this->_left_brace = $left_brace;
        $this->_spread_operator = $spread_operator;
        $this->_expression = $expression;
        $this->_right_brace = $right_brace;
    }

    /**
     * @return array<string, EditableNode>
     */
    public function getChildren(): array
    {
        return ['left_brace' => $this->_left_brace, 'spread_operator' => $this->_spread_operator, 'expression' => $this->_expression, 'right_brace' => $this->_right_brace];
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
        $left_brace = $this->_left_brace->rewrite($rewriter, $parents);
        $spread_operator = $this->_spread_operator->rewrite($rewriter, $parents);
        $expression = $this->_expression->rewrite($rewriter, $parents);
        $right_brace = $this->_right_brace->rewrite($rewriter, $parents);

        if ($left_brace === $this->_left_brace && $spread_operator === $this->_spread_operator && $expression === $this->_expression && $right_brace === $this->_right_brace) {
            return $this;
        }

        return new static($left_brace, $spread_operator, $expression, $right_brace);
    }

    public function hasLeftBrace(): bool
    {
        return !$this->_left_brace->isMissing();
    }

    public function withLeftBrace(EditableNode $value): self
    {
        if ($value === $this->_left_brace) {
            return $this;
        }

        return new static($value, $this->_spread_operator, $this->_expression, $this->_right_brace);
    }

    public function getLeftBrace(): EditableNode
    {
        return $this->_left_brace;
    }

    public function hasSpreadOperator(): bool
    {
        return !$this->_spread_operator->isMissing();
    }

    public function withSpreadOperator(EditableNode $value): self
    {
        if ($value === $this->_spread_operator) {
            return $this;
        }

        return new static($this->_left_brace, $value, $this->_expression, $this->_right_brace);
    }

    public function getSpreadOperator(): EditableNode
    {
        return $this->_spread_operator;
    }

    public function hasExpression(): bool
    {
        return !$this->_expression->isMissing();
    }

    public function withExpression(EditableNode $value): self
    {
        if ($value === $this->_expression) {
            return $this;
        }

        return new static($this->_left_brace, $this->_spread_operator, $value, $this->_right_brace);
    }

    public function getExpression(): EditableNode
    {
        return $this->_expression;
    }

    public function hasRightBrace(): bool
    {
        return !$this->_right_brace->isMissing();
    }

    public function withRightBrace(EditableNode $value): self
    {
        if ($value === $this->_right_brace) {
            return $this;
        }

        return new static($this->_left_brace, $this->_spread_operator, $this->_expression, $value);
    }

    public function getRightBrace(): EditableNode
    {
        return $this->_right_brace;
    }
}
