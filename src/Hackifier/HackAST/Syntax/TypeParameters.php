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
final class TypeParameters extends EditableNode
{
    /**
     * @var EditableNode
     */
    private $_left_angle;

    /**
     * @var EditableNode
     */
    private $_parameters;

    /**
     * @var EditableNode
     */
    private $_right_angle;

    public function __construct(EditableNode $left_angle, EditableNode $parameters, EditableNode $right_angle)
    {
        parent::__construct('type_parameters');
        $this->_left_angle = $left_angle;
        $this->_parameters = $parameters;
        $this->_right_angle = $right_angle;
    }

    /**
     * @return array<string, EditableNode>
     */
    public function getChildren(): array
    {
        return ['left_angle' => $this->_left_angle, 'parameters' => $this->_parameters, 'right_angle' => $this->_right_angle];
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
        $parameters = $this->_parameters->rewrite($rewriter, $parents);
        $right_angle = $this->_right_angle->rewrite($rewriter, $parents);

        if ($left_angle === $this->_left_angle && $parameters === $this->_parameters && $right_angle === $this->_right_angle) {
            return $this;
        }

        return new static($left_angle, $parameters, $right_angle);
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

        return new static($value, $this->_parameters, $this->_right_angle);
    }

    public function getLeftAngle(): EditableNode
    {
        return $this->_left_angle;
    }

    public function hasParameters(): bool
    {
        return !$this->_parameters->isMissing();
    }

    public function withParameters(EditableNode $value): self
    {
        if ($value === $this->_parameters) {
            return $this;
        }

        return new static($this->_left_angle, $value, $this->_right_angle);
    }

    public function getParameters(): EditableNode
    {
        return $this->_parameters;
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

        return new static($this->_left_angle, $this->_parameters, $value);
    }

    public function getRightAngle(): EditableNode
    {
        return $this->_right_angle;
    }
}
