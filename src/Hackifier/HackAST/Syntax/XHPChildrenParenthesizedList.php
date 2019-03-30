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
final class XHPChildrenParenthesizedList extends EditableNode
{
    /**
     * @var EditableNode
     */
    private $_left_paren;

    /**
     * @var EditableNode
     */
    private $_xhp_children;

    /**
     * @var EditableNode
     */
    private $_right_paren;

    public function __construct(EditableNode $left_paren, EditableNode $xhp_children, EditableNode $right_paren)
    {
        parent::__construct('xhp_children_parenthesized_list');
        $this->_left_paren = $left_paren;
        $this->_xhp_children = $xhp_children;
        $this->_right_paren = $right_paren;
    }

    /**
     * @return array<string, EditableNode>
     */
    public function getChildren(): array
    {
        return ['left_paren' => $this->_left_paren, 'xhp_children' => $this->_xhp_children, 'right_paren' => $this->_right_paren];
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
        $xhp_children = $this->_xhp_children->rewrite($rewriter, $parents);
        $right_paren = $this->_right_paren->rewrite($rewriter, $parents);

        if ($left_paren === $this->_left_paren && $xhp_children === $this->_xhp_children && $right_paren === $this->_right_paren) {
            return $this;
        }

        return new static($left_paren, $xhp_children, $right_paren);
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

        return new static($value, $this->_xhp_children, $this->_right_paren);
    }

    public function getLeftParen(): EditableNode
    {
        return $this->_left_paren;
    }

    public function hasXhpChildren(): bool
    {
        return !$this->_xhp_children->isMissing();
    }

    public function withXhpChildren(EditableNode $value): self
    {
        if ($value === $this->_xhp_children) {
            return $this;
        }

        return new static($this->_left_paren, $value, $this->_right_paren);
    }

    public function getXhpChildren(): EditableNode
    {
        return $this->_xhp_children;
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

        return new static($this->_left_paren, $this->_xhp_children, $value);
    }

    public function getRightParen(): EditableNode
    {
        return $this->_right_paren;
    }
}
