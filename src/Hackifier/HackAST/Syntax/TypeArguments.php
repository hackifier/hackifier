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
final class TypeArguments extends EditableNode
{
    /**
     * @var EditableNode
     */
    private $_left_angle;

    /**
     * @var EditableNode
     */
    private $_types;

    /**
     * @var EditableNode
     */
    private $_right_angle;

    public function __construct(EditableNode $left_angle, EditableNode $types, EditableNode $right_angle)
    {
        parent::__construct('type_arguments');
        $this->_left_angle = $left_angle;
        $this->_types = $types;
        $this->_right_angle = $right_angle;
    }

    /**
     * @return array<string, EditableNode>
     */
    public function getChildren(): array
    {
        return ['left_angle' => $this->_left_angle, 'types' => $this->_types, 'right_angle' => $this->_right_angle];
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
        $types = $this->_types->rewrite($rewriter, $parents);
        $right_angle = $this->_right_angle->rewrite($rewriter, $parents);

        if ($left_angle === $this->_left_angle && $types === $this->_types && $right_angle === $this->_right_angle) {
            return $this;
        }

        return new static($left_angle, $types, $right_angle);
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

        return new static($value, $this->_types, $this->_right_angle);
    }

    public function getLeftAngle(): EditableNode
    {
        return $this->_left_angle;
    }

    public function hasTypes(): bool
    {
        return !$this->_types->isMissing();
    }

    public function withTypes(EditableNode $value): self
    {
        if ($value === $this->_types) {
            return $this;
        }

        return new static($this->_left_angle, $value, $this->_right_angle);
    }

    public function getTypes(): EditableNode
    {
        return $this->_types;
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

        return new static($this->_left_angle, $this->_types, $value);
    }

    public function getRightAngle(): EditableNode
    {
        return $this->_right_angle;
    }
}
