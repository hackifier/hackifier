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
final class AlternateSwitchStatement extends EditableNode implements IControlFlowStatement
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
    private $_opening_colon;

    /**
     * @var EditableNode
     */
    private $_sections;

    /**
     * @var EditableNode
     */
    private $_closing_endswitch;

    /**
     * @var EditableNode
     */
    private $_closing_semicolon;

    public function __construct(EditableNode $keyword, EditableNode $left_paren, EditableNode $expression, EditableNode $right_paren, EditableNode $opening_colon, EditableNode $sections, EditableNode $closing_endswitch, EditableNode $closing_semicolon)
    {
        parent::__construct('alternate_switch_statement');
        $this->_keyword = $keyword;
        $this->_left_paren = $left_paren;
        $this->_expression = $expression;
        $this->_right_paren = $right_paren;
        $this->_opening_colon = $opening_colon;
        $this->_sections = $sections;
        $this->_closing_endswitch = $closing_endswitch;
        $this->_closing_semicolon = $closing_semicolon;
    }

    /**
     * @return array<string, EditableNode>
     */
    public function getChildren(): array
    {
        return ['keyword' => $this->_keyword, 'left_paren' => $this->_left_paren, 'expression' => $this->_expression, 'right_paren' => $this->_right_paren, 'opening_colon' => $this->_opening_colon, 'sections' => $this->_sections, 'closing_endswitch' => $this->_closing_endswitch, 'closing_semicolon' => $this->_closing_semicolon];
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
        $opening_colon = $this->_opening_colon->rewrite($rewriter, $parents);
        $sections = $this->_sections->rewrite($rewriter, $parents);
        $closing_endswitch = $this->_closing_endswitch->rewrite($rewriter, $parents);
        $closing_semicolon = $this->_closing_semicolon->rewrite($rewriter, $parents);

        if ($keyword === $this->_keyword && $left_paren === $this->_left_paren && $expression === $this->_expression && $right_paren === $this->_right_paren && $opening_colon === $this->_opening_colon && $sections === $this->_sections && $closing_endswitch === $this->_closing_endswitch && $closing_semicolon === $this->_closing_semicolon) {
            return $this;
        }

        return new static($keyword, $left_paren, $expression, $right_paren, $opening_colon, $sections, $closing_endswitch, $closing_semicolon);
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

        return new static($value, $this->_left_paren, $this->_expression, $this->_right_paren, $this->_opening_colon, $this->_sections, $this->_closing_endswitch, $this->_closing_semicolon);
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

        return new static($this->_keyword, $value, $this->_expression, $this->_right_paren, $this->_opening_colon, $this->_sections, $this->_closing_endswitch, $this->_closing_semicolon);
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

        return new static($this->_keyword, $this->_left_paren, $value, $this->_right_paren, $this->_opening_colon, $this->_sections, $this->_closing_endswitch, $this->_closing_semicolon);
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

        return new static($this->_keyword, $this->_left_paren, $this->_expression, $value, $this->_opening_colon, $this->_sections, $this->_closing_endswitch, $this->_closing_semicolon);
    }

    public function getRightParen(): EditableNode
    {
        return $this->_right_paren;
    }

    public function hasOpeningColon(): bool
    {
        return !$this->_opening_colon->isMissing();
    }

    public function withOpeningColon(EditableNode $value): self
    {
        if ($value === $this->_opening_colon) {
            return $this;
        }

        return new static($this->_keyword, $this->_left_paren, $this->_expression, $this->_right_paren, $value, $this->_sections, $this->_closing_endswitch, $this->_closing_semicolon);
    }

    public function getOpeningColon(): EditableNode
    {
        return $this->_opening_colon;
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

        return new static($this->_keyword, $this->_left_paren, $this->_expression, $this->_right_paren, $this->_opening_colon, $value, $this->_closing_endswitch, $this->_closing_semicolon);
    }

    public function getSections(): EditableNode
    {
        return $this->_sections;
    }

    public function hasClosingEndswitch(): bool
    {
        return !$this->_closing_endswitch->isMissing();
    }

    public function withClosingEndswitch(EditableNode $value): self
    {
        if ($value === $this->_closing_endswitch) {
            return $this;
        }

        return new static($this->_keyword, $this->_left_paren, $this->_expression, $this->_right_paren, $this->_opening_colon, $this->_sections, $value, $this->_closing_semicolon);
    }

    public function getClosingEndswitch(): EditableNode
    {
        return $this->_closing_endswitch;
    }

    public function hasClosingSemicolon(): bool
    {
        return !$this->_closing_semicolon->isMissing();
    }

    public function withClosingSemicolon(EditableNode $value): self
    {
        if ($value === $this->_closing_semicolon) {
            return $this;
        }

        return new static($this->_keyword, $this->_left_paren, $this->_expression, $this->_right_paren, $this->_opening_colon, $this->_sections, $this->_closing_endswitch, $value);
    }

    public function getClosingSemicolon(): EditableNode
    {
        return $this->_closing_semicolon;
    }
}
