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
use Hackifier\HackAST\ILoopStatement;

/**
 * This class is generated. Do not modify it manually!
 *
 * @version 2018-11-27-0001
 */
abstract class AlternateLoopStatementGeneratedBase extends EditableNode implements IControlFlowStatement, ILoopStatement
{
    /**
     * @var EditableNode
     */
    private $_opening_colon;

    /**
     * @var EditableNode
     */
    private $_statements;

    /**
     * @var EditableNode
     */
    private $_closing_keyword;

    /**
     * @var EditableNode
     */
    private $_closing_semicolon;

    public function __construct(EditableNode $opening_colon, EditableNode $statements, EditableNode $closing_keyword, EditableNode $closing_semicolon)
    {
        parent::__construct('alternate_loop_statement');
        $this->_opening_colon = $opening_colon;
        $this->_statements = $statements;
        $this->_closing_keyword = $closing_keyword;
        $this->_closing_semicolon = $closing_semicolon;
    }

    /**
     * @return array<string, EditableNode>
     */
    public function getChildren(): array
    {
        return ['opening_colon' => $this->_opening_colon, 'statements' => $this->_statements, 'closing_keyword' => $this->_closing_keyword, 'closing_semicolon' => $this->_closing_semicolon];
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
        $opening_colon = $this->_opening_colon->rewrite($rewriter, $parents);
        $statements = $this->_statements->rewrite($rewriter, $parents);
        $closing_keyword = $this->_closing_keyword->rewrite($rewriter, $parents);
        $closing_semicolon = $this->_closing_semicolon->rewrite($rewriter, $parents);

        if ($opening_colon === $this->_opening_colon && $statements === $this->_statements && $closing_keyword === $this->_closing_keyword && $closing_semicolon === $this->_closing_semicolon) {
            return $this;
        }

        return new static($opening_colon, $statements, $closing_keyword, $closing_semicolon);
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

        return new static($value, $this->_statements, $this->_closing_keyword, $this->_closing_semicolon);
    }

    public function getOpeningColon(): EditableNode
    {
        return $this->_opening_colon;
    }

    public function hasStatements(): bool
    {
        return !$this->_statements->isMissing();
    }

    public function withStatements(EditableNode $value): self
    {
        if ($value === $this->_statements) {
            return $this;
        }

        return new static($this->_opening_colon, $value, $this->_closing_keyword, $this->_closing_semicolon);
    }

    public function getStatements(): EditableNode
    {
        return $this->_statements;
    }

    public function hasClosingKeyword(): bool
    {
        return !$this->_closing_keyword->isMissing();
    }

    public function withClosingKeyword(EditableNode $value): self
    {
        if ($value === $this->_closing_keyword) {
            return $this;
        }

        return new static($this->_opening_colon, $this->_statements, $value, $this->_closing_semicolon);
    }

    public function getClosingKeyword(): EditableNode
    {
        return $this->_closing_keyword;
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

        return new static($this->_opening_colon, $this->_statements, $this->_closing_keyword, $value);
    }

    public function getClosingSemicolon(): EditableNode
    {
        return $this->_closing_semicolon;
    }
}
