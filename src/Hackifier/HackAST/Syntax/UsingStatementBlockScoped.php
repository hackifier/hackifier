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
final class UsingStatementBlockScoped extends EditableNode
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
    private $_left_paren;

    /**
     * @var EditableNode
     */
    private $_expressions;

    /**
     * @var EditableNode
     */
    private $_right_paren;

    /**
     * @var EditableNode
     */
    private $_body;

    public function __construct(EditableNode $await_keyword, EditableNode $using_keyword, EditableNode $left_paren, EditableNode $expressions, EditableNode $right_paren, EditableNode $body)
    {
        parent::__construct('using_statement_block_scoped');
        $this->_await_keyword = $await_keyword;
        $this->_using_keyword = $using_keyword;
        $this->_left_paren = $left_paren;
        $this->_expressions = $expressions;
        $this->_right_paren = $right_paren;
        $this->_body = $body;
    }

    /**
     * @return array<string, EditableNode>
     */
    public function getChildren(): array
    {
        return ['await_keyword' => $this->_await_keyword, 'using_keyword' => $this->_using_keyword, 'left_paren' => $this->_left_paren, 'expressions' => $this->_expressions, 'right_paren' => $this->_right_paren, 'body' => $this->_body];
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
        $left_paren = $this->_left_paren->rewrite($rewriter, $parents);
        $expressions = $this->_expressions->rewrite($rewriter, $parents);
        $right_paren = $this->_right_paren->rewrite($rewriter, $parents);
        $body = $this->_body->rewrite($rewriter, $parents);

        if ($await_keyword === $this->_await_keyword && $using_keyword === $this->_using_keyword && $left_paren === $this->_left_paren && $expressions === $this->_expressions && $right_paren === $this->_right_paren && $body === $this->_body) {
            return $this;
        }

        return new static($await_keyword, $using_keyword, $left_paren, $expressions, $right_paren, $body);
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

        return new static($value, $this->_using_keyword, $this->_left_paren, $this->_expressions, $this->_right_paren, $this->_body);
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

        return new static($this->_await_keyword, $value, $this->_left_paren, $this->_expressions, $this->_right_paren, $this->_body);
    }

    public function getUsingKeyword(): EditableNode
    {
        return $this->_using_keyword;
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

        return new static($this->_await_keyword, $this->_using_keyword, $value, $this->_expressions, $this->_right_paren, $this->_body);
    }

    public function getLeftParen(): EditableNode
    {
        return $this->_left_paren;
    }

    public function hasExpressions(): bool
    {
        return !$this->_expressions->isMissing();
    }

    public function withExpressions(EditableNode $value): self
    {
        if ($value === $this->_expressions) {
            return $this;
        }

        return new static($this->_await_keyword, $this->_using_keyword, $this->_left_paren, $value, $this->_right_paren, $this->_body);
    }

    public function getExpressions(): EditableNode
    {
        return $this->_expressions;
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

        return new static($this->_await_keyword, $this->_using_keyword, $this->_left_paren, $this->_expressions, $value, $this->_body);
    }

    public function getRightParen(): EditableNode
    {
        return $this->_right_paren;
    }

    public function hasBody(): bool
    {
        return !$this->_body->isMissing();
    }

    public function withBody(EditableNode $value): self
    {
        if ($value === $this->_body) {
            return $this;
        }

        return new static($this->_await_keyword, $this->_using_keyword, $this->_left_paren, $this->_expressions, $this->_right_paren, $value);
    }

    public function getBody(): EditableNode
    {
        return $this->_body;
    }
}
