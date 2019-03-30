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
final class ForeachStatement extends EditableNode implements IControlFlowStatement, ILoopStatement
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
    private $_collection;

    /**
     * @var EditableNode
     */
    private $_await_keyword;

    /**
     * @var EditableNode
     */
    private $_as;

    /**
     * @var EditableNode
     */
    private $_key;

    /**
     * @var EditableNode
     */
    private $_arrow;

    /**
     * @var EditableNode
     */
    private $_value;

    /**
     * @var EditableNode
     */
    private $_right_paren;

    /**
     * @var EditableNode
     */
    private $_body;

    public function __construct(EditableNode $keyword, EditableNode $left_paren, EditableNode $collection, EditableNode $await_keyword, EditableNode $as, EditableNode $key, EditableNode $arrow, EditableNode $value, EditableNode $right_paren, EditableNode $body)
    {
        parent::__construct('foreach_statement');
        $this->_keyword = $keyword;
        $this->_left_paren = $left_paren;
        $this->_collection = $collection;
        $this->_await_keyword = $await_keyword;
        $this->_as = $as;
        $this->_key = $key;
        $this->_arrow = $arrow;
        $this->_value = $value;
        $this->_right_paren = $right_paren;
        $this->_body = $body;
    }

    /**
     * @return array<string, EditableNode>
     */
    public function getChildren(): array
    {
        return ['keyword' => $this->_keyword, 'left_paren' => $this->_left_paren, 'collection' => $this->_collection, 'await_keyword' => $this->_await_keyword, 'as' => $this->_as, 'key' => $this->_key, 'arrow' => $this->_arrow, 'value' => $this->_value, 'right_paren' => $this->_right_paren, 'body' => $this->_body];
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
        $collection = $this->_collection->rewrite($rewriter, $parents);
        $await_keyword = $this->_await_keyword->rewrite($rewriter, $parents);
        $as = $this->_as->rewrite($rewriter, $parents);
        $key = $this->_key->rewrite($rewriter, $parents);
        $arrow = $this->_arrow->rewrite($rewriter, $parents);
        $value = $this->_value->rewrite($rewriter, $parents);
        $right_paren = $this->_right_paren->rewrite($rewriter, $parents);
        $body = $this->_body->rewrite($rewriter, $parents);

        if ($keyword === $this->_keyword && $left_paren === $this->_left_paren && $collection === $this->_collection && $await_keyword === $this->_await_keyword && $as === $this->_as && $key === $this->_key && $arrow === $this->_arrow && $value === $this->_value && $right_paren === $this->_right_paren && $body === $this->_body) {
            return $this;
        }

        return new static($keyword, $left_paren, $collection, $await_keyword, $as, $key, $arrow, $value, $right_paren, $body);
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

        return new static($value, $this->_left_paren, $this->_collection, $this->_await_keyword, $this->_as, $this->_key, $this->_arrow, $this->_value, $this->_right_paren, $this->_body);
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

        return new static($this->_keyword, $value, $this->_collection, $this->_await_keyword, $this->_as, $this->_key, $this->_arrow, $this->_value, $this->_right_paren, $this->_body);
    }

    public function getLeftParen(): EditableNode
    {
        return $this->_left_paren;
    }

    public function hasCollection(): bool
    {
        return !$this->_collection->isMissing();
    }

    public function withCollection(EditableNode $value): self
    {
        if ($value === $this->_collection) {
            return $this;
        }

        return new static($this->_keyword, $this->_left_paren, $value, $this->_await_keyword, $this->_as, $this->_key, $this->_arrow, $this->_value, $this->_right_paren, $this->_body);
    }

    public function getCollection(): EditableNode
    {
        return $this->_collection;
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

        return new static($this->_keyword, $this->_left_paren, $this->_collection, $value, $this->_as, $this->_key, $this->_arrow, $this->_value, $this->_right_paren, $this->_body);
    }

    public function getAwaitKeyword(): EditableNode
    {
        return $this->_await_keyword;
    }

    public function hasAs(): bool
    {
        return !$this->_as->isMissing();
    }

    public function withAs(EditableNode $value): self
    {
        if ($value === $this->_as) {
            return $this;
        }

        return new static($this->_keyword, $this->_left_paren, $this->_collection, $this->_await_keyword, $value, $this->_key, $this->_arrow, $this->_value, $this->_right_paren, $this->_body);
    }

    public function getAs(): EditableNode
    {
        return $this->_as;
    }

    public function hasKey(): bool
    {
        return !$this->_key->isMissing();
    }

    public function withKey(EditableNode $value): self
    {
        if ($value === $this->_key) {
            return $this;
        }

        return new static($this->_keyword, $this->_left_paren, $this->_collection, $this->_await_keyword, $this->_as, $value, $this->_arrow, $this->_value, $this->_right_paren, $this->_body);
    }

    public function getKey(): EditableNode
    {
        return $this->_key;
    }

    public function hasArrow(): bool
    {
        return !$this->_arrow->isMissing();
    }

    public function withArrow(EditableNode $value): self
    {
        if ($value === $this->_arrow) {
            return $this;
        }

        return new static($this->_keyword, $this->_left_paren, $this->_collection, $this->_await_keyword, $this->_as, $this->_key, $value, $this->_value, $this->_right_paren, $this->_body);
    }

    public function getArrow(): EditableNode
    {
        return $this->_arrow;
    }

    public function hasValue(): bool
    {
        return !$this->_value->isMissing();
    }

    public function withValue(EditableNode $value): self
    {
        if ($value === $this->_value) {
            return $this;
        }

        return new static($this->_keyword, $this->_left_paren, $this->_collection, $this->_await_keyword, $this->_as, $this->_key, $this->_arrow, $value, $this->_right_paren, $this->_body);
    }

    public function getValue(): EditableNode
    {
        return $this->_value;
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

        return new static($this->_keyword, $this->_left_paren, $this->_collection, $this->_await_keyword, $this->_as, $this->_key, $this->_arrow, $this->_value, $value, $this->_body);
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

        return new static($this->_keyword, $this->_left_paren, $this->_collection, $this->_await_keyword, $this->_as, $this->_key, $this->_arrow, $this->_value, $this->_right_paren, $value);
    }

    public function getBody(): EditableNode
    {
        return $this->_body;
    }
}
