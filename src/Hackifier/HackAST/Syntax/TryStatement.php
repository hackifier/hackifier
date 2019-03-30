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
final class TryStatement extends EditableNode
{
    /**
     * @var EditableNode
     */
    private $_keyword;

    /**
     * @var EditableNode
     */
    private $_compound_statement;

    /**
     * @var EditableNode
     */
    private $_catch_clauses;

    /**
     * @var EditableNode
     */
    private $_finally_clause;

    public function __construct(EditableNode $keyword, EditableNode $compound_statement, EditableNode $catch_clauses, EditableNode $finally_clause)
    {
        parent::__construct('try_statement');
        $this->_keyword = $keyword;
        $this->_compound_statement = $compound_statement;
        $this->_catch_clauses = $catch_clauses;
        $this->_finally_clause = $finally_clause;
    }

    /**
     * @return array<string, EditableNode>
     */
    public function getChildren(): array
    {
        return ['keyword' => $this->_keyword, 'compound_statement' => $this->_compound_statement, 'catch_clauses' => $this->_catch_clauses, 'finally_clause' => $this->_finally_clause];
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
        $compound_statement = $this->_compound_statement->rewrite($rewriter, $parents);
        $catch_clauses = $this->_catch_clauses->rewrite($rewriter, $parents);
        $finally_clause = $this->_finally_clause->rewrite($rewriter, $parents);

        if ($keyword === $this->_keyword && $compound_statement === $this->_compound_statement && $catch_clauses === $this->_catch_clauses && $finally_clause === $this->_finally_clause) {
            return $this;
        }

        return new static($keyword, $compound_statement, $catch_clauses, $finally_clause);
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

        return new static($value, $this->_compound_statement, $this->_catch_clauses, $this->_finally_clause);
    }

    public function getKeyword(): EditableNode
    {
        return $this->_keyword;
    }

    public function hasCompoundStatement(): bool
    {
        return !$this->_compound_statement->isMissing();
    }

    public function withCompoundStatement(EditableNode $value): self
    {
        if ($value === $this->_compound_statement) {
            return $this;
        }

        return new static($this->_keyword, $value, $this->_catch_clauses, $this->_finally_clause);
    }

    public function getCompoundStatement(): EditableNode
    {
        return $this->_compound_statement;
    }

    public function hasCatchClauses(): bool
    {
        return !$this->_catch_clauses->isMissing();
    }

    public function withCatchClauses(EditableNode $value): self
    {
        if ($value === $this->_catch_clauses) {
            return $this;
        }

        return new static($this->_keyword, $this->_compound_statement, $value, $this->_finally_clause);
    }

    public function getCatchClauses(): EditableNode
    {
        return $this->_catch_clauses;
    }

    public function hasFinallyClause(): bool
    {
        return !$this->_finally_clause->isMissing();
    }

    public function withFinallyClause(EditableNode $value): self
    {
        if ($value === $this->_finally_clause) {
            return $this;
        }

        return new static($this->_keyword, $this->_compound_statement, $this->_catch_clauses, $value);
    }

    public function getFinallyClause(): EditableNode
    {
        return $this->_finally_clause;
    }
}
