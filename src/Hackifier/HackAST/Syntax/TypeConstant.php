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
final class TypeConstant extends EditableNode
{
    /**
     * @var EditableNode
     */
    private $_left_type;

    /**
     * @var EditableNode
     */
    private $_separator;

    /**
     * @var EditableNode
     */
    private $_right_type;

    public function __construct(EditableNode $left_type, EditableNode $separator, EditableNode $right_type)
    {
        parent::__construct('type_constant');
        $this->_left_type = $left_type;
        $this->_separator = $separator;
        $this->_right_type = $right_type;
    }

    /**
     * @return array<string, EditableNode>
     */
    public function getChildren(): array
    {
        return ['left_type' => $this->_left_type, 'separator' => $this->_separator, 'right_type' => $this->_right_type];
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
        $left_type = $this->_left_type->rewrite($rewriter, $parents);
        $separator = $this->_separator->rewrite($rewriter, $parents);
        $right_type = $this->_right_type->rewrite($rewriter, $parents);

        if ($left_type === $this->_left_type && $separator === $this->_separator && $right_type === $this->_right_type) {
            return $this;
        }

        return new static($left_type, $separator, $right_type);
    }

    public function hasLeftType(): bool
    {
        return !$this->_left_type->isMissing();
    }

    public function withLeftType(EditableNode $value): self
    {
        if ($value === $this->_left_type) {
            return $this;
        }

        return new static($value, $this->_separator, $this->_right_type);
    }

    public function getLeftType(): EditableNode
    {
        return $this->_left_type;
    }

    public function hasSeparator(): bool
    {
        return !$this->_separator->isMissing();
    }

    public function withSeparator(EditableNode $value): self
    {
        if ($value === $this->_separator) {
            return $this;
        }

        return new static($this->_left_type, $value, $this->_right_type);
    }

    public function getSeparator(): EditableNode
    {
        return $this->_separator;
    }

    public function hasRightType(): bool
    {
        return !$this->_right_type->isMissing();
    }

    public function withRightType(EditableNode $value): self
    {
        if ($value === $this->_right_type) {
            return $this;
        }

        return new static($this->_left_type, $this->_separator, $value);
    }

    public function getRightType(): EditableNode
    {
        return $this->_right_type;
    }
}
