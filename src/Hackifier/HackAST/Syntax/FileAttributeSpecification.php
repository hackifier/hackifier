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
final class FileAttributeSpecification extends EditableNode
{
    /**
     * @var EditableNode
     */
    private $_left_double_angle;

    /**
     * @var EditableNode
     */
    private $_keyword;

    /**
     * @var EditableNode
     */
    private $_colon;

    /**
     * @var EditableNode
     */
    private $_attributes;

    /**
     * @var EditableNode
     */
    private $_right_double_angle;

    public function __construct(EditableNode $left_double_angle, EditableNode $keyword, EditableNode $colon, EditableNode $attributes, EditableNode $right_double_angle)
    {
        parent::__construct('file_attribute_specification');
        $this->_left_double_angle = $left_double_angle;
        $this->_keyword = $keyword;
        $this->_colon = $colon;
        $this->_attributes = $attributes;
        $this->_right_double_angle = $right_double_angle;
    }

    /**
     * @return array<string, EditableNode>
     */
    public function getChildren(): array
    {
        return ['left_double_angle' => $this->_left_double_angle, 'keyword' => $this->_keyword, 'colon' => $this->_colon, 'attributes' => $this->_attributes, 'right_double_angle' => $this->_right_double_angle];
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
        $left_double_angle = $this->_left_double_angle->rewrite($rewriter, $parents);
        $keyword = $this->_keyword->rewrite($rewriter, $parents);
        $colon = $this->_colon->rewrite($rewriter, $parents);
        $attributes = $this->_attributes->rewrite($rewriter, $parents);
        $right_double_angle = $this->_right_double_angle->rewrite($rewriter, $parents);

        if ($left_double_angle === $this->_left_double_angle && $keyword === $this->_keyword && $colon === $this->_colon && $attributes === $this->_attributes && $right_double_angle === $this->_right_double_angle) {
            return $this;
        }

        return new static($left_double_angle, $keyword, $colon, $attributes, $right_double_angle);
    }

    public function hasLeftDoubleAngle(): bool
    {
        return !$this->_left_double_angle->isMissing();
    }

    public function withLeftDoubleAngle(EditableNode $value): self
    {
        if ($value === $this->_left_double_angle) {
            return $this;
        }

        return new static($value, $this->_keyword, $this->_colon, $this->_attributes, $this->_right_double_angle);
    }

    public function getLeftDoubleAngle(): EditableNode
    {
        return $this->_left_double_angle;
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

        return new static($this->_left_double_angle, $value, $this->_colon, $this->_attributes, $this->_right_double_angle);
    }

    public function getKeyword(): EditableNode
    {
        return $this->_keyword;
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

        return new static($this->_left_double_angle, $this->_keyword, $value, $this->_attributes, $this->_right_double_angle);
    }

    public function getColon(): EditableNode
    {
        return $this->_colon;
    }

    public function hasAttributes(): bool
    {
        return !$this->_attributes->isMissing();
    }

    public function withAttributes(EditableNode $value): self
    {
        if ($value === $this->_attributes) {
            return $this;
        }

        return new static($this->_left_double_angle, $this->_keyword, $this->_colon, $value, $this->_right_double_angle);
    }

    public function getAttributes(): EditableNode
    {
        return $this->_attributes;
    }

    public function hasRightDoubleAngle(): bool
    {
        return !$this->_right_double_angle->isMissing();
    }

    public function withRightDoubleAngle(EditableNode $value): self
    {
        if ($value === $this->_right_double_angle) {
            return $this;
        }

        return new static($this->_left_double_angle, $this->_keyword, $this->_colon, $this->_attributes, $value);
    }

    public function getRightDoubleAngle(): EditableNode
    {
        return $this->_right_double_angle;
    }
}
