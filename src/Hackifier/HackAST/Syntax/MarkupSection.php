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
final class MarkupSection extends EditableNode
{
    /**
     * @var EditableNode
     */
    private $_prefix;

    /**
     * @var EditableNode
     */
    private $_text;

    /**
     * @var EditableNode
     */
    private $_suffix;

    /**
     * @var EditableNode
     */
    private $_expression;

    public function __construct(EditableNode $prefix, EditableNode $text, EditableNode $suffix, EditableNode $expression)
    {
        parent::__construct('markup_section');
        $this->_prefix = $prefix;
        $this->_text = $text;
        $this->_suffix = $suffix;
        $this->_expression = $expression;
    }

    /**
     * @return array<string, EditableNode>
     */
    public function getChildren(): array
    {
        return ['prefix' => $this->_prefix, 'text' => $this->_text, 'suffix' => $this->_suffix, 'expression' => $this->_expression];
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
        $prefix = $this->_prefix->rewrite($rewriter, $parents);
        $text = $this->_text->rewrite($rewriter, $parents);
        $suffix = $this->_suffix->rewrite($rewriter, $parents);
        $expression = $this->_expression->rewrite($rewriter, $parents);

        if ($prefix === $this->_prefix && $text === $this->_text && $suffix === $this->_suffix && $expression === $this->_expression) {
            return $this;
        }

        return new static($prefix, $text, $suffix, $expression);
    }

    public function hasPrefix(): bool
    {
        return !$this->_prefix->isMissing();
    }

    public function withPrefix(EditableNode $value): self
    {
        if ($value === $this->_prefix) {
            return $this;
        }

        return new static($value, $this->_text, $this->_suffix, $this->_expression);
    }

    public function getPrefix(): EditableNode
    {
        return $this->_prefix;
    }

    public function hasText(): bool
    {
        return !$this->_text->isMissing();
    }

    public function withText(EditableNode $value): self
    {
        if ($value === $this->_text) {
            return $this;
        }

        return new static($this->_prefix, $value, $this->_suffix, $this->_expression);
    }

    public function getText(): EditableNode
    {
        return $this->_text;
    }

    public function hasSuffix(): bool
    {
        return !$this->_suffix->isMissing();
    }

    public function withSuffix(EditableNode $value): self
    {
        if ($value === $this->_suffix) {
            return $this;
        }

        return new static($this->_prefix, $this->_text, $value, $this->_expression);
    }

    public function getSuffix(): EditableNode
    {
        return $this->_suffix;
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

        return new static($this->_prefix, $this->_text, $this->_suffix, $value);
    }

    public function getExpression(): EditableNode
    {
        return $this->_expression;
    }
}
