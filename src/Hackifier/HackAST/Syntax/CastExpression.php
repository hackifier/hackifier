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
final class CastExpression extends EditableNode
{
    /**
     * @var EditableNode
     */
    private $_left_paren;

    /**
     * @var EditableNode
     */
    private $_type;

    /**
     * @var EditableNode
     */
    private $_right_paren;

    /**
     * @var EditableNode
     */
    private $_operand;

    public function __construct(EditableNode $left_paren, EditableNode $type, EditableNode $right_paren, EditableNode $operand)
    {
        parent::__construct('cast_expression');
        $this->_left_paren = $left_paren;
        $this->_type = $type;
        $this->_right_paren = $right_paren;
        $this->_operand = $operand;
    }

    /**
     * @return array<string, EditableNode>
     */
    public function getChildren(): array
    {
        return ['left_paren' => $this->_left_paren, 'type' => $this->_type, 'right_paren' => $this->_right_paren, 'operand' => $this->_operand];
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
        $type = $this->_type->rewrite($rewriter, $parents);
        $right_paren = $this->_right_paren->rewrite($rewriter, $parents);
        $operand = $this->_operand->rewrite($rewriter, $parents);

        if ($left_paren === $this->_left_paren && $type === $this->_type && $right_paren === $this->_right_paren && $operand === $this->_operand) {
            return $this;
        }

        return new static($left_paren, $type, $right_paren, $operand);
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

        return new static($value, $this->_type, $this->_right_paren, $this->_operand);
    }

    public function getLeftParen(): EditableNode
    {
        return $this->_left_paren;
    }

    public function hasType(): bool
    {
        return !$this->_type->isMissing();
    }

    public function withType(EditableNode $value): self
    {
        if ($value === $this->_type) {
            return $this;
        }

        return new static($this->_left_paren, $value, $this->_right_paren, $this->_operand);
    }

    public function getType(): EditableNode
    {
        return $this->_type;
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

        return new static($this->_left_paren, $this->_type, $value, $this->_operand);
    }

    public function getRightParen(): EditableNode
    {
        return $this->_right_paren;
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

        return new static($this->_left_paren, $this->_type, $this->_right_paren, $value);
    }

    public function getOperand(): EditableNode
    {
        return $this->_operand;
    }
}
