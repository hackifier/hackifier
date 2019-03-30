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
final class ConstructorCall extends EditableNode
{
    /**
     * @var EditableNode
     */
    private $_type;

    /**
     * @var EditableNode
     */
    private $_left_paren;

    /**
     * @var EditableNode
     */
    private $_argument_list;

    /**
     * @var EditableNode
     */
    private $_right_paren;

    public function __construct(EditableNode $type, EditableNode $left_paren, EditableNode $argument_list, EditableNode $right_paren)
    {
        parent::__construct('constructor_call');
        $this->_type = $type;
        $this->_left_paren = $left_paren;
        $this->_argument_list = $argument_list;
        $this->_right_paren = $right_paren;
    }

    /**
     * @return array<string, EditableNode>
     */
    public function getChildren(): array
    {
        return ['type' => $this->_type, 'left_paren' => $this->_left_paren, 'argument_list' => $this->_argument_list, 'right_paren' => $this->_right_paren];
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
        $type = $this->_type->rewrite($rewriter, $parents);
        $left_paren = $this->_left_paren->rewrite($rewriter, $parents);
        $argument_list = $this->_argument_list->rewrite($rewriter, $parents);
        $right_paren = $this->_right_paren->rewrite($rewriter, $parents);

        if ($type === $this->_type && $left_paren === $this->_left_paren && $argument_list === $this->_argument_list && $right_paren === $this->_right_paren) {
            return $this;
        }

        return new static($type, $left_paren, $argument_list, $right_paren);
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

        return new static($value, $this->_left_paren, $this->_argument_list, $this->_right_paren);
    }

    public function getType(): EditableNode
    {
        return $this->_type;
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

        return new static($this->_type, $value, $this->_argument_list, $this->_right_paren);
    }

    public function getLeftParen(): EditableNode
    {
        return $this->_left_paren;
    }

    public function hasArgumentList(): bool
    {
        return !$this->_argument_list->isMissing();
    }

    public function withArgumentList(EditableNode $value): self
    {
        if ($value === $this->_argument_list) {
            return $this;
        }

        return new static($this->_type, $this->_left_paren, $value, $this->_right_paren);
    }

    public function getArgumentList(): EditableNode
    {
        return $this->_argument_list;
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

        return new static($this->_type, $this->_left_paren, $this->_argument_list, $value);
    }

    public function getRightParen(): EditableNode
    {
        return $this->_right_paren;
    }
}
