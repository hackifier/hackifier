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
final class DictionaryTypeSpecifier extends EditableNode
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
    private $_members;

    /**
     * @var EditableNode
     */
    private $_right_angle;

    public function __construct(EditableNode $keyword, EditableNode $left_angle, EditableNode $members, EditableNode $right_angle)
    {
        parent::__construct('dictionary_type_specifier');
        $this->_keyword = $keyword;
        $this->_left_angle = $left_angle;
        $this->_members = $members;
        $this->_right_angle = $right_angle;
    }

    /**
     * @return array<string, EditableNode>
     */
    public function getChildren(): array
    {
        return ['keyword' => $this->_keyword, 'left_angle' => $this->_left_angle, 'members' => $this->_members, 'right_angle' => $this->_right_angle];
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
        $members = $this->_members->rewrite($rewriter, $parents);
        $right_angle = $this->_right_angle->rewrite($rewriter, $parents);

        if ($keyword === $this->_keyword && $left_angle === $this->_left_angle && $members === $this->_members && $right_angle === $this->_right_angle) {
            return $this;
        }

        return new static($keyword, $left_angle, $members, $right_angle);
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

        return new static($value, $this->_left_angle, $this->_members, $this->_right_angle);
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

        return new static($this->_keyword, $value, $this->_members, $this->_right_angle);
    }

    public function getLeftAngle(): EditableNode
    {
        return $this->_left_angle;
    }

    public function hasMembers(): bool
    {
        return !$this->_members->isMissing();
    }

    public function withMembers(EditableNode $value): self
    {
        if ($value === $this->_members) {
            return $this;
        }

        return new static($this->_keyword, $this->_left_angle, $value, $this->_right_angle);
    }

    public function getMembers(): EditableNode
    {
        return $this->_members;
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

        return new static($this->_keyword, $this->_left_angle, $this->_members, $value);
    }

    public function getRightAngle(): EditableNode
    {
        return $this->_right_angle;
    }
}
