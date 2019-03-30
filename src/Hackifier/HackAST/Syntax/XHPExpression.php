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
final class XHPExpression extends EditableNode
{
    /**
     * @var EditableNode
     */
    private $_open;

    /**
     * @var EditableNode
     */
    private $_body;

    /**
     * @var EditableNode
     */
    private $_close;

    public function __construct(EditableNode $open, EditableNode $body, EditableNode $close)
    {
        parent::__construct('xhp_expression');
        $this->_open = $open;
        $this->_body = $body;
        $this->_close = $close;
    }

    /**
     * @return array<string, EditableNode>
     */
    public function getChildren(): array
    {
        return ['open' => $this->_open, 'body' => $this->_body, 'close' => $this->_close];
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
        $open = $this->_open->rewrite($rewriter, $parents);
        $body = $this->_body->rewrite($rewriter, $parents);
        $close = $this->_close->rewrite($rewriter, $parents);

        if ($open === $this->_open && $body === $this->_body && $close === $this->_close) {
            return $this;
        }

        return new static($open, $body, $close);
    }

    public function hasOpen(): bool
    {
        return !$this->_open->isMissing();
    }

    public function withOpen(EditableNode $value): self
    {
        if ($value === $this->_open) {
            return $this;
        }

        return new static($value, $this->_body, $this->_close);
    }

    public function getOpen(): EditableNode
    {
        return $this->_open;
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

        return new static($this->_open, $value, $this->_close);
    }

    public function getBody(): EditableNode
    {
        return $this->_body;
    }

    public function hasClose(): bool
    {
        return !$this->_close->isMissing();
    }

    public function withClose(EditableNode $value): self
    {
        if ($value === $this->_close) {
            return $this;
        }

        return new static($this->_open, $this->_body, $value);
    }

    public function getClose(): EditableNode
    {
        return $this->_close;
    }
}
