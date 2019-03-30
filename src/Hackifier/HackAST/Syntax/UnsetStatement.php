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
final class UnsetStatement extends EditableNode
{
    /**
     * @var EditableNode
     */
    private $_keyword;

    /**
     * @var EditableNode
     */
    private $_left_paren;

    /**
     * @var EditableNode
     */
    private $_variables;

    /**
     * @var EditableNode
     */
    private $_right_paren;

    /**
     * @var EditableNode
     */
    private $_semicolon;

    public function __construct(EditableNode $keyword, EditableNode $left_paren, EditableNode $variables, EditableNode $right_paren, EditableNode $semicolon)
    {
        parent::__construct('unset_statement');
        $this->_keyword = $keyword;
        $this->_left_paren = $left_paren;
        $this->_variables = $variables;
        $this->_right_paren = $right_paren;
        $this->_semicolon = $semicolon;
    }

    /**
     * @return array<string, EditableNode>
     */
    public function getChildren(): array
    {
        return ['keyword' => $this->_keyword, 'left_paren' => $this->_left_paren, 'variables' => $this->_variables, 'right_paren' => $this->_right_paren, 'semicolon' => $this->_semicolon];
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
        $left_paren = $this->_left_paren->rewrite($rewriter, $parents);
        $variables = $this->_variables->rewrite($rewriter, $parents);
        $right_paren = $this->_right_paren->rewrite($rewriter, $parents);
        $semicolon = $this->_semicolon->rewrite($rewriter, $parents);

        if ($keyword === $this->_keyword && $left_paren === $this->_left_paren && $variables === $this->_variables && $right_paren === $this->_right_paren && $semicolon === $this->_semicolon) {
            return $this;
        }

        return new static($keyword, $left_paren, $variables, $right_paren, $semicolon);
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

        return new static($value, $this->_left_paren, $this->_variables, $this->_right_paren, $this->_semicolon);
    }

    public function getKeyword(): EditableNode
    {
        return $this->_keyword;
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

        return new static($this->_keyword, $value, $this->_variables, $this->_right_paren, $this->_semicolon);
    }

    public function getLeftParen(): EditableNode
    {
        return $this->_left_paren;
    }

    public function hasVariables(): bool
    {
        return !$this->_variables->isMissing();
    }

    public function withVariables(EditableNode $value): self
    {
        if ($value === $this->_variables) {
            return $this;
        }

        return new static($this->_keyword, $this->_left_paren, $value, $this->_right_paren, $this->_semicolon);
    }

    public function getVariables(): EditableNode
    {
        return $this->_variables;
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

        return new static($this->_keyword, $this->_left_paren, $this->_variables, $value, $this->_semicolon);
    }

    public function getRightParen(): EditableNode
    {
        return $this->_right_paren;
    }

    public function hasSemicolon(): bool
    {
        return !$this->_semicolon->isMissing();
    }

    public function withSemicolon(EditableNode $value): self
    {
        if ($value === $this->_semicolon) {
            return $this;
        }

        return new static($this->_keyword, $this->_left_paren, $this->_variables, $this->_right_paren, $value);
    }

    public function getSemicolon(): EditableNode
    {
        return $this->_semicolon;
    }
}
