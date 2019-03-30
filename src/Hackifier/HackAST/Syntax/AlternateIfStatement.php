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
final class AlternateIfStatement extends EditableNode
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
    private $_condition;

    /**
     * @var EditableNode
     */
    private $_right_paren;

    /**
     * @var EditableNode
     */
    private $_colon;

    /**
     * @var EditableNode
     */
    private $_statement;

    /**
     * @var EditableNode
     */
    private $_elseif_clauses;

    /**
     * @var EditableNode
     */
    private $_else_clause;

    /**
     * @var EditableNode
     */
    private $_endif_keyword;

    /**
     * @var EditableNode
     */
    private $_semicolon;

    public function __construct(EditableNode $keyword, EditableNode $left_paren, EditableNode $condition, EditableNode $right_paren, EditableNode $colon, EditableNode $statement, EditableNode $elseif_clauses, EditableNode $else_clause, EditableNode $endif_keyword, EditableNode $semicolon)
    {
        parent::__construct('alternate_if_statement');
        $this->_keyword = $keyword;
        $this->_left_paren = $left_paren;
        $this->_condition = $condition;
        $this->_right_paren = $right_paren;
        $this->_colon = $colon;
        $this->_statement = $statement;
        $this->_elseif_clauses = $elseif_clauses;
        $this->_else_clause = $else_clause;
        $this->_endif_keyword = $endif_keyword;
        $this->_semicolon = $semicolon;
    }

    /**
     * @return array<string, EditableNode>
     */
    public function getChildren(): array
    {
        return ['keyword' => $this->_keyword, 'left_paren' => $this->_left_paren, 'condition' => $this->_condition, 'right_paren' => $this->_right_paren, 'colon' => $this->_colon, 'statement' => $this->_statement, 'elseif_clauses' => $this->_elseif_clauses, 'else_clause' => $this->_else_clause, 'endif_keyword' => $this->_endif_keyword, 'semicolon' => $this->_semicolon];
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
        $condition = $this->_condition->rewrite($rewriter, $parents);
        $right_paren = $this->_right_paren->rewrite($rewriter, $parents);
        $colon = $this->_colon->rewrite($rewriter, $parents);
        $statement = $this->_statement->rewrite($rewriter, $parents);
        $elseif_clauses = $this->_elseif_clauses->rewrite($rewriter, $parents);
        $else_clause = $this->_else_clause->rewrite($rewriter, $parents);
        $endif_keyword = $this->_endif_keyword->rewrite($rewriter, $parents);
        $semicolon = $this->_semicolon->rewrite($rewriter, $parents);

        if ($keyword === $this->_keyword && $left_paren === $this->_left_paren && $condition === $this->_condition && $right_paren === $this->_right_paren && $colon === $this->_colon && $statement === $this->_statement && $elseif_clauses === $this->_elseif_clauses && $else_clause === $this->_else_clause && $endif_keyword === $this->_endif_keyword && $semicolon === $this->_semicolon) {
            return $this;
        }

        return new static($keyword, $left_paren, $condition, $right_paren, $colon, $statement, $elseif_clauses, $else_clause, $endif_keyword, $semicolon);
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

        return new static($value, $this->_left_paren, $this->_condition, $this->_right_paren, $this->_colon, $this->_statement, $this->_elseif_clauses, $this->_else_clause, $this->_endif_keyword, $this->_semicolon);
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

        return new static($this->_keyword, $value, $this->_condition, $this->_right_paren, $this->_colon, $this->_statement, $this->_elseif_clauses, $this->_else_clause, $this->_endif_keyword, $this->_semicolon);
    }

    public function getLeftParen(): EditableNode
    {
        return $this->_left_paren;
    }

    public function hasCondition(): bool
    {
        return !$this->_condition->isMissing();
    }

    public function withCondition(EditableNode $value): self
    {
        if ($value === $this->_condition) {
            return $this;
        }

        return new static($this->_keyword, $this->_left_paren, $value, $this->_right_paren, $this->_colon, $this->_statement, $this->_elseif_clauses, $this->_else_clause, $this->_endif_keyword, $this->_semicolon);
    }

    public function getCondition(): EditableNode
    {
        return $this->_condition;
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

        return new static($this->_keyword, $this->_left_paren, $this->_condition, $value, $this->_colon, $this->_statement, $this->_elseif_clauses, $this->_else_clause, $this->_endif_keyword, $this->_semicolon);
    }

    public function getRightParen(): EditableNode
    {
        return $this->_right_paren;
    }

    public function hasColon(): bool
    {
        return !$this->_colon->isMissing();
    }

    public function withColon(EditableNode $value): self
    {
        if ($value === $this->_colon) {
            return $this;
        }

        return new static($this->_keyword, $this->_left_paren, $this->_condition, $this->_right_paren, $value, $this->_statement, $this->_elseif_clauses, $this->_else_clause, $this->_endif_keyword, $this->_semicolon);
    }

    public function getColon(): EditableNode
    {
        return $this->_colon;
    }

    public function hasStatement(): bool
    {
        return !$this->_statement->isMissing();
    }

    public function withStatement(EditableNode $value): self
    {
        if ($value === $this->_statement) {
            return $this;
        }

        return new static($this->_keyword, $this->_left_paren, $this->_condition, $this->_right_paren, $this->_colon, $value, $this->_elseif_clauses, $this->_else_clause, $this->_endif_keyword, $this->_semicolon);
    }

    public function getStatement(): EditableNode
    {
        return $this->_statement;
    }

    public function hasElseifClauses(): bool
    {
        return !$this->_elseif_clauses->isMissing();
    }

    public function withElseifClauses(EditableNode $value): self
    {
        if ($value === $this->_elseif_clauses) {
            return $this;
        }

        return new static($this->_keyword, $this->_left_paren, $this->_condition, $this->_right_paren, $this->_colon, $this->_statement, $value, $this->_else_clause, $this->_endif_keyword, $this->_semicolon);
    }

    public function getElseifClauses(): EditableNode
    {
        return $this->_elseif_clauses;
    }

    public function hasElseClause(): bool
    {
        return !$this->_else_clause->isMissing();
    }

    public function withElseClause(EditableNode $value): self
    {
        if ($value === $this->_else_clause) {
            return $this;
        }

        return new static($this->_keyword, $this->_left_paren, $this->_condition, $this->_right_paren, $this->_colon, $this->_statement, $this->_elseif_clauses, $value, $this->_endif_keyword, $this->_semicolon);
    }

    public function getElseClause(): EditableNode
    {
        return $this->_else_clause;
    }

    public function hasEndifKeyword(): bool
    {
        return !$this->_endif_keyword->isMissing();
    }

    public function withEndifKeyword(EditableNode $value): self
    {
        if ($value === $this->_endif_keyword) {
            return $this;
        }

        return new static($this->_keyword, $this->_left_paren, $this->_condition, $this->_right_paren, $this->_colon, $this->_statement, $this->_elseif_clauses, $this->_else_clause, $value, $this->_semicolon);
    }

    public function getEndifKeyword(): EditableNode
    {
        return $this->_endif_keyword;
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

        return new static($this->_keyword, $this->_left_paren, $this->_condition, $this->_right_paren, $this->_colon, $this->_statement, $this->_elseif_clauses, $this->_else_clause, $this->_endif_keyword, $value);
    }

    public function getSemicolon(): EditableNode
    {
        return $this->_semicolon;
    }
}
