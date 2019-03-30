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
final class ClassishBody extends EditableNode
{
    /**
     * @var EditableNode
     */
    private $_left_brace;

    /**
     * @var EditableNode
     */
    private $_elements;

    /**
     * @var EditableNode
     */
    private $_right_brace;

    public function __construct(EditableNode $left_brace, EditableNode $elements, EditableNode $right_brace)
    {
        parent::__construct('classish_body');
        $this->_left_brace = $left_brace;
        $this->_elements = $elements;
        $this->_right_brace = $right_brace;
    }

    /**
     * @return array<string, EditableNode>
     */
    public function getChildren(): array
    {
        return ['left_brace' => $this->_left_brace, 'elements' => $this->_elements, 'right_brace' => $this->_right_brace];
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
        $left_brace = $this->_left_brace->rewrite($rewriter, $parents);
        $elements = $this->_elements->rewrite($rewriter, $parents);
        $right_brace = $this->_right_brace->rewrite($rewriter, $parents);

        if ($left_brace === $this->_left_brace && $elements === $this->_elements && $right_brace === $this->_right_brace) {
            return $this;
        }

        return new static($left_brace, $elements, $right_brace);
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

        return new static($value, $this->_elements, $this->_right_brace);
    }

    public function getLeftBrace(): EditableNode
    {
        return $this->_left_brace;
    }

    public function hasElements(): bool
    {
        return !$this->_elements->isMissing();
    }

    public function withElements(EditableNode $value): self
    {
        if ($value === $this->_elements) {
            return $this;
        }

        return new static($this->_left_brace, $value, $this->_right_brace);
    }

    public function getElements(): EditableNode
    {
        return $this->_elements;
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

        return new static($this->_left_brace, $this->_elements, $value);
    }

    public function getRightBrace(): EditableNode
    {
        return $this->_right_brace;
    }
}
