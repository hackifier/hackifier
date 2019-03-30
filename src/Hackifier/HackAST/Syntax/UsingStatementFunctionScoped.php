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
final class UsingStatementFunctionScoped extends EditableNode
{
    /**
     * @var EditableNode
     */
    private $_await_keyword;

    /**
     * @var EditableNode
     */
    private $_using_keyword;

    /**
     * @var EditableNode
     */
    private $_expression;

    /**
     * @var EditableNode
     */
    private $_semicolon;

    public function __construct(EditableNode $await_keyword, EditableNode $using_keyword, EditableNode $expression, EditableNode $semicolon)
    {
        parent::__construct('using_statement_function_scoped');
        $this->_await_keyword = $await_keyword;
        $this->_using_keyword = $using_keyword;
        $this->_expression = $expression;
        $this->_semicolon = $semicolon;
    }

    /**
     * @return array<string, EditableNode>
     */
    public function getChildren(): array
    {
        return ['await_keyword' => $this->_await_keyword, 'using_keyword' => $this->_using_keyword, 'expression' => $this->_expression, 'semicolon' => $this->_semicolon];
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
        $await_keyword = $this->_await_keyword->rewrite($rewriter, $parents);
        $using_keyword = $this->_using_keyword->rewrite($rewriter, $parents);
        $expression = $this->_expression->rewrite($rewriter, $parents);
        $semicolon = $this->_semicolon->rewrite($rewriter, $parents);

        if ($await_keyword === $this->_await_keyword && $using_keyword === $this->_using_keyword && $expression === $this->_expression && $semicolon === $this->_semicolon) {
            return $this;
        }

        return new static($await_keyword, $using_keyword, $expression, $semicolon);
    }

    public function hasAwaitKeyword(): bool
    {
        return !$this->_await_keyword->isMissing();
    }

    public function withAwaitKeyword(EditableNode $value): self
    {
        if ($value === $this->_await_keyword) {
            return $this;
        }

        return new static($value, $this->_using_keyword, $this->_expression, $this->_semicolon);
    }

    public function getAwaitKeyword(): EditableNode
    {
        return $this->_await_keyword;
    }

    public function hasUsingKeyword(): bool
    {
        return !$this->_using_keyword->isMissing();
    }

    public function withUsingKeyword(EditableNode $value): self
    {
        if ($value === $this->_using_keyword) {
            return $this;
        }

        return new static($this->_await_keyword, $value, $this->_expression, $this->_semicolon);
    }

    public function getUsingKeyword(): EditableNode
    {
        return $this->_using_keyword;
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

        return new static($this->_await_keyword, $this->_using_keyword, $value, $this->_semicolon);
    }

    public function getExpression(): EditableNode
    {
        return $this->_expression;
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

        return new static($this->_await_keyword, $this->_using_keyword, $this->_expression, $value);
    }

    public function getSemicolon(): EditableNode
    {
        return $this->_semicolon;
    }
}
