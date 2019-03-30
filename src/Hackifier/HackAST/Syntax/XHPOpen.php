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
final class XHPOpen extends EditableNode
{
    /**
     * @var EditableNode
     */
    private $_left_angle;

    /**
     * @var EditableNode
     */
    private $_name;

    /**
     * @var EditableNode
     */
    private $_attributes;

    /**
     * @var EditableNode
     */
    private $_right_angle;

    public function __construct(EditableNode $left_angle, EditableNode $name, EditableNode $attributes, EditableNode $right_angle)
    {
        parent::__construct('xhp_open');
        $this->_left_angle = $left_angle;
        $this->_name = $name;
        $this->_attributes = $attributes;
        $this->_right_angle = $right_angle;
    }

    /**
     * @return array<string, EditableNode>
     */
    public function getChildren(): array
    {
        return ['left_angle' => $this->_left_angle, 'name' => $this->_name, 'attributes' => $this->_attributes, 'right_angle' => $this->_right_angle];
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
        $left_angle = $this->_left_angle->rewrite($rewriter, $parents);
        $name = $this->_name->rewrite($rewriter, $parents);
        $attributes = $this->_attributes->rewrite($rewriter, $parents);
        $right_angle = $this->_right_angle->rewrite($rewriter, $parents);

        if ($left_angle === $this->_left_angle && $name === $this->_name && $attributes === $this->_attributes && $right_angle === $this->_right_angle) {
            return $this;
        }

        return new static($left_angle, $name, $attributes, $right_angle);
    }

    public function hasLeftAngle(): bool
    {
        return !$this->_left_angle->isMissing();
    }

    public function withLeftAngle(EditableNode $value): self
    {
        if ($value === $this->_left_angle) {
            return $this;
        }

        return new static($value, $this->_name, $this->_attributes, $this->_right_angle);
    }

    public function getLeftAngle(): EditableNode
    {
        return $this->_left_angle;
    }

    public function hasName(): bool
    {
        return !$this->_name->isMissing();
    }

    public function withName(EditableNode $value): self
    {
        if ($value === $this->_name) {
            return $this;
        }

        return new static($this->_left_angle, $value, $this->_attributes, $this->_right_angle);
    }

    public function getName(): EditableNode
    {
        return $this->_name;
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

        return new static($this->_left_angle, $this->_name, $value, $this->_right_angle);
    }

    public function getAttributes(): EditableNode
    {
        return $this->_attributes;
    }

    public function hasRightAngle(): bool
    {
        return !$this->_right_angle->isMissing();
    }

    public function withRightAngle(EditableNode $value): self
    {
        if ($value === $this->_right_angle) {
            return $this;
        }

        return new static($this->_left_angle, $this->_name, $this->_attributes, $value);
    }

    public function getRightAngle(): EditableNode
    {
        return $this->_right_angle;
    }
}
