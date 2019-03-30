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
final class MapArrayTypeSpecifier extends EditableNode
{
    /**
     * @var EditableNode
     */
    private $_keyword;

    /**
     * @var EditableNode
     */
    private $_left_angle;

    /**
     * @var EditableNode
     */
    private $_key;

    /**
     * @var EditableNode
     */
    private $_comma;

    /**
     * @var EditableNode
     */
    private $_value;

    /**
     * @var EditableNode
     */
    private $_right_angle;

    public function __construct(EditableNode $keyword, EditableNode $left_angle, EditableNode $key, EditableNode $comma, EditableNode $value, EditableNode $right_angle)
    {
        parent::__construct('map_array_type_specifier');
        $this->_keyword = $keyword;
        $this->_left_angle = $left_angle;
        $this->_key = $key;
        $this->_comma = $comma;
        $this->_value = $value;
        $this->_right_angle = $right_angle;
    }

    /**
     * @return array<string, EditableNode>
     */
    public function getChildren(): array
    {
        return ['keyword' => $this->_keyword, 'left_angle' => $this->_left_angle, 'key' => $this->_key, 'comma' => $this->_comma, 'value' => $this->_value, 'right_angle' => $this->_right_angle];
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
        $left_angle = $this->_left_angle->rewrite($rewriter, $parents);
        $key = $this->_key->rewrite($rewriter, $parents);
        $comma = $this->_comma->rewrite($rewriter, $parents);
        $value = $this->_value->rewrite($rewriter, $parents);
        $right_angle = $this->_right_angle->rewrite($rewriter, $parents);

        if ($keyword === $this->_keyword && $left_angle === $this->_left_angle && $key === $this->_key && $comma === $this->_comma && $value === $this->_value && $right_angle === $this->_right_angle) {
            return $this;
        }

        return new static($keyword, $left_angle, $key, $comma, $value, $right_angle);
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

        return new static($value, $this->_left_angle, $this->_key, $this->_comma, $this->_value, $this->_right_angle);
    }

    public function getKeyword(): EditableNode
    {
        return $this->_keyword;
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

        return new static($this->_keyword, $value, $this->_key, $this->_comma, $this->_value, $this->_right_angle);
    }

    public function getLeftAngle(): EditableNode
    {
        return $this->_left_angle;
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

        return new static($this->_keyword, $this->_left_angle, $value, $this->_comma, $this->_value, $this->_right_angle);
    }

    public function getKey(): EditableNode
    {
        return $this->_key;
    }

    public function hasComma(): bool
    {
        return !$this->_comma->isMissing();
    }

    public function withComma(EditableNode $value): self
    {
        if ($value === $this->_comma) {
            return $this;
        }

        return new static($this->_keyword, $this->_left_angle, $this->_key, $value, $this->_value, $this->_right_angle);
    }

    public function getComma(): EditableNode
    {
        return $this->_comma;
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

        return new static($this->_keyword, $this->_left_angle, $this->_key, $this->_comma, $value, $this->_right_angle);
    }

    public function getValue(): EditableNode
    {
        return $this->_value;
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

        return new static($this->_keyword, $this->_left_angle, $this->_key, $this->_comma, $this->_value, $value);
    }

    public function getRightAngle(): EditableNode
    {
        return $this->_right_angle;
    }
}
