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
final class ParenthesizedExpression extends EditableNode
{
    /**
     * @var EditableNode
     */
    private $_left_paren;

    /**
     * @var EditableNode
     */
    private $_expression;

    /**
     * @var EditableNode
     */
    private $_right_paren;

    public function __construct(EditableNode $left_paren, EditableNode $expression, EditableNode $right_paren)
    {
        parent::__construct('parenthesized_expression');
        $this->_left_paren = $left_paren;
        $this->_expression = $expression;
        $this->_right_paren = $right_paren;
    }

    /**
     * @return array<string, EditableNode>
     */
    public function getChildren(): array
    {
        return ['left_paren' => $this->_left_paren, 'expression' => $this->_expression, 'right_paren' => $this->_right_paren];
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
        $left_paren = $this->_left_paren->rewrite($rewriter, $parents);
        $expression = $this->_expression->rewrite($rewriter, $parents);
        $right_paren = $this->_right_paren->rewrite($rewriter, $parents);

        if ($left_paren === $this->_left_paren && $expression === $this->_expression && $right_paren === $this->_right_paren) {
            return $this;
        }

        return new static($left_paren, $expression, $right_paren);
    }

    public function hasLeftParen(): bool
    {
        return !$this->_left_paren->isMissing();
    }

    public function withLeftParen(EditableNode $value): self
    {
        if ($value === $this->_left_paren) {
            return $this;
        }

        return new static($value, $this->_expression, $this->_right_paren);
    }

    public function getLeftParen(): EditableNode
    {
        return $this->_left_paren;
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

        return new static($this->_left_paren, $value, $this->_right_paren);
    }

    public function getExpression(): EditableNode
    {
        return $this->_expression;
    }

    public function hasRightParen(): bool
    {
        return !$this->_right_paren->isMissing();
    }

    public function withRightParen(EditableNode $value): self
    {
        if ($value === $this->_right_paren) {
            return $this;
        }

        return new static($this->_left_paren, $this->_expression, $value);
    }

    public function getRightParen(): EditableNode
    {
        return $this->_right_paren;
    }
}
