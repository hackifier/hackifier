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
use Hackifier\HackAST\IControlFlowStatement;

/**
 * This class is generated. Do not modify it manually!
 *
 * @version 2018-11-27-0001
 */
final class SwitchStatement extends EditableNode implements IControlFlowStatement
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
    private $_expression;

    /**
     * @var EditableNode
     */
    private $_right_paren;

    /**
     * @var EditableNode
     */
    private $_left_brace;

    /**
     * @var EditableNode
     */
    private $_sections;

    /**
     * @var EditableNode
     */
    private $_right_brace;

    public function __construct(EditableNode $keyword, EditableNode $left_paren, EditableNode $expression, EditableNode $right_paren, EditableNode $left_brace, EditableNode $sections, EditableNode $right_brace)
    {
        parent::__construct('switch_statement');
        $this->_keyword = $keyword;
        $this->_left_paren = $left_paren;
        $this->_expression = $expression;
        $this->_right_paren = $right_paren;
        $this->_left_brace = $left_brace;
        $this->_sections = $sections;
        $this->_right_brace = $right_brace;
    }

    /**
     * @return array<string, EditableNode>
     */
    public function getChildren(): array
    {
        return ['keyword' => $this->_keyword, 'left_paren' => $this->_left_paren, 'expression' => $this->_expression, 'right_paren' => $this->_right_paren, 'left_brace' => $this->_left_brace, 'sections' => $this->_sections, 'right_brace' => $this->_right_brace];
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
        $expression = $this->_expression->rewrite($rewriter, $parents);
        $right_paren = $this->_right_paren->rewrite($rewriter, $parents);
        $left_brace = $this->_left_brace->rewrite($rewriter, $parents);
        $sections = $this->_sections->rewrite($rewriter, $parents);
        $right_brace = $this->_right_brace->rewrite($rewriter, $parents);

        if ($keyword === $this->_keyword && $left_paren === $this->_left_paren && $expression === $this->_expression && $right_paren === $this->_right_paren && $left_brace === $this->_left_brace && $sections === $this->_sections && $right_brace === $this->_right_brace) {
            return $this;
        }

        return new static($keyword, $left_paren, $expression, $right_paren, $left_brace, $sections, $right_brace);
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

        return new static($value, $this->_left_paren, $this->_expression, $this->_right_paren, $this->_left_brace, $this->_sections, $this->_right_brace);
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

        return new static($this->_keyword, $value, $this->_expression, $this->_right_paren, $this->_left_brace, $this->_sections, $this->_right_brace);
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

        return new static($this->_keyword, $this->_left_paren, $value, $this->_right_paren, $this->_left_brace, $this->_sections, $this->_right_brace);
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

        return new static($this->_keyword, $this->_left_paren, $this->_expression, $value, $this->_left_brace, $this->_sections, $this->_right_brace);
    }

    public function getRightParen(): EditableNode
    {
        return $this->_right_paren;
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

        return new static($this->_keyword, $this->_left_paren, $this->_expression, $this->_right_paren, $value, $this->_sections, $this->_right_brace);
    }

    public function getLeftBrace(): EditableNode
    {
        return $this->_left_brace;
    }

    public function hasSections(): bool
    {
        return !$this->_sections->isMissing();
    }

    public function withSections(EditableNode $value): self
    {
        if ($value === $this->_sections) {
            return $this;
        }

        return new static($this->_keyword, $this->_left_paren, $this->_expression, $this->_right_paren, $this->_left_brace, $value, $this->_right_brace);
    }

    public function getSections(): EditableNode
    {
        return $this->_sections;
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

        return new static($this->_keyword, $this->_left_paren, $this->_expression, $this->_right_paren, $this->_left_brace, $this->_sections, $value);
    }

    public function getRightBrace(): EditableNode
    {
        return $this->_right_brace;
    }
}
