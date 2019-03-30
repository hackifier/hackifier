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
final class DictionaryIntrinsicExpression extends EditableNode
{
    /**
     * @var EditableNode
     */
    private $_keyword;

    /**
     * @var EditableNode
     */
    private $_explicit_type;

    /**
     * @var EditableNode
     */
    private $_left_bracket;

    /**
     * @var EditableNode
     */
    private $_members;

    /**
     * @var EditableNode
     */
    private $_right_bracket;

    public function __construct(EditableNode $keyword, EditableNode $explicit_type, EditableNode $left_bracket, EditableNode $members, EditableNode $right_bracket)
    {
        parent::__construct('dictionary_intrinsic_expression');
        $this->_keyword = $keyword;
        $this->_explicit_type = $explicit_type;
        $this->_left_bracket = $left_bracket;
        $this->_members = $members;
        $this->_right_bracket = $right_bracket;
    }

    /**
     * @return array<string, EditableNode>
     */
    public function getChildren(): array
    {
        return ['keyword' => $this->_keyword, 'explicit_type' => $this->_explicit_type, 'left_bracket' => $this->_left_bracket, 'members' => $this->_members, 'right_bracket' => $this->_right_bracket];
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
        $keyword = $this->_keyword->rewrite($rewriter, $parents);
        $explicit_type = $this->_explicit_type->rewrite($rewriter, $parents);
        $left_bracket = $this->_left_bracket->rewrite($rewriter, $parents);
        $members = $this->_members->rewrite($rewriter, $parents);
        $right_bracket = $this->_right_bracket->rewrite($rewriter, $parents);

        if ($keyword === $this->_keyword && $explicit_type === $this->_explicit_type && $left_bracket === $this->_left_bracket && $members === $this->_members && $right_bracket === $this->_right_bracket) {
            return $this;
        }

        return new static($keyword, $explicit_type, $left_bracket, $members, $right_bracket);
    }

    public function hasKeyword(): bool
    {
        return !$this->_keyword->isMissing();
    }

    public function withKeyword(EditableNode $value): self
    {
        if ($value === $this->_keyword) {
            return $this;
        }

        return new static($value, $this->_explicit_type, $this->_left_bracket, $this->_members, $this->_right_bracket);
    }

    public function getKeyword(): EditableNode
    {
        return $this->_keyword;
    }

    public function hasExplicitType(): bool
    {
        return !$this->_explicit_type->isMissing();
    }

    public function withExplicitType(EditableNode $value): self
    {
        if ($value === $this->_explicit_type) {
            return $this;
        }

        return new static($this->_keyword, $value, $this->_left_bracket, $this->_members, $this->_right_bracket);
    }

    public function getExplicitType(): EditableNode
    {
        return $this->_explicit_type;
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

        return new static($this->_keyword, $this->_explicit_type, $value, $this->_members, $this->_right_bracket);
    }

    public function getLeftBracket(): EditableNode
    {
        return $this->_left_bracket;
    }

    public function hasMembers(): bool
    {
        return !$this->_members->isMissing();
    }

    public function withMembers(EditableNode $value): self
    {
        if ($value === $this->_members) {
            return $this;
        }

        return new static($this->_keyword, $this->_explicit_type, $this->_left_bracket, $value, $this->_right_bracket);
    }

    public function getMembers(): EditableNode
    {
        return $this->_members;
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

        return new static($this->_keyword, $this->_explicit_type, $this->_left_bracket, $this->_members, $value);
    }

    public function getRightBracket(): EditableNode
    {
        return $this->_right_bracket;
    }
}
