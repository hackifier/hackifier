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
final class XHPEnumType extends EditableNode
{
    /**
     * @var EditableNode
     */
    private $_optional;

    /**
     * @var EditableNode
     */
    private $_keyword;

    /**
     * @var EditableNode
     */
    private $_left_brace;

    /**
     * @var EditableNode
     */
    private $_values;

    /**
     * @var EditableNode
     */
    private $_right_brace;

    public function __construct(EditableNode $optional, EditableNode $keyword, EditableNode $left_brace, EditableNode $values, EditableNode $right_brace)
    {
        parent::__construct('xhp_enum_type');
        $this->_optional = $optional;
        $this->_keyword = $keyword;
        $this->_left_brace = $left_brace;
        $this->_values = $values;
        $this->_right_brace = $right_brace;
    }

    /**
     * @return array<string, EditableNode>
     */
    public function getChildren(): array
    {
        return ['optional' => $this->_optional, 'keyword' => $this->_keyword, 'left_brace' => $this->_left_brace, 'values' => $this->_values, 'right_brace' => $this->_right_brace];
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
        $optional = $this->_optional->rewrite($rewriter, $parents);
        $keyword = $this->_keyword->rewrite($rewriter, $parents);
        $left_brace = $this->_left_brace->rewrite($rewriter, $parents);
        $values = $this->_values->rewrite($rewriter, $parents);
        $right_brace = $this->_right_brace->rewrite($rewriter, $parents);

        if ($optional === $this->_optional && $keyword === $this->_keyword && $left_brace === $this->_left_brace && $values === $this->_values && $right_brace === $this->_right_brace) {
            return $this;
        }

        return new static($optional, $keyword, $left_brace, $values, $right_brace);
    }

    public function hasOptional(): bool
    {
        return !$this->_optional->isMissing();
    }

    public function withOptional(EditableNode $value): self
    {
        if ($value === $this->_optional) {
            return $this;
        }

        return new static($value, $this->_keyword, $this->_left_brace, $this->_values, $this->_right_brace);
    }

    public function getOptional(): EditableNode
    {
        return $this->_optional;
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

        return new static($this->_optional, $value, $this->_left_brace, $this->_values, $this->_right_brace);
    }

    public function getKeyword(): EditableNode
    {
        return $this->_keyword;
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

        return new static($this->_optional, $this->_keyword, $value, $this->_values, $this->_right_brace);
    }

    public function getLeftBrace(): EditableNode
    {
        return $this->_left_brace;
    }

    public function hasValues(): bool
    {
        return !$this->_values->isMissing();
    }

    public function withValues(EditableNode $value): self
    {
        if ($value === $this->_values) {
            return $this;
        }

        return new static($this->_optional, $this->_keyword, $this->_left_brace, $value, $this->_right_brace);
    }

    public function getValues(): EditableNode
    {
        return $this->_values;
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

        return new static($this->_optional, $this->_keyword, $this->_left_brace, $this->_values, $value);
    }

    public function getRightBrace(): EditableNode
    {
        return $this->_right_brace;
    }
}
