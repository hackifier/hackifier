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
final class CollectionLiteralExpression extends EditableNode
{
    /**
     * @var EditableNode
     */
    private $_name;

    /**
     * @var EditableNode
     */
    private $_left_brace;

    /**
     * @var EditableNode
     */
    private $_initializers;

    /**
     * @var EditableNode
     */
    private $_right_brace;

    public function __construct(EditableNode $name, EditableNode $left_brace, EditableNode $initializers, EditableNode $right_brace)
    {
        parent::__construct('collection_literal_expression');
        $this->_name = $name;
        $this->_left_brace = $left_brace;
        $this->_initializers = $initializers;
        $this->_right_brace = $right_brace;
    }

    /**
     * @return array<string, EditableNode>
     */
    public function getChildren(): array
    {
        return ['name' => $this->_name, 'left_brace' => $this->_left_brace, 'initializers' => $this->_initializers, 'right_brace' => $this->_right_brace];
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
        $name = $this->_name->rewrite($rewriter, $parents);
        $left_brace = $this->_left_brace->rewrite($rewriter, $parents);
        $initializers = $this->_initializers->rewrite($rewriter, $parents);
        $right_brace = $this->_right_brace->rewrite($rewriter, $parents);

        if ($name === $this->_name && $left_brace === $this->_left_brace && $initializers === $this->_initializers && $right_brace === $this->_right_brace) {
            return $this;
        }

        return new static($name, $left_brace, $initializers, $right_brace);
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

        return new static($value, $this->_left_brace, $this->_initializers, $this->_right_brace);
    }

    public function getName(): EditableNode
    {
        return $this->_name;
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

        return new static($this->_name, $value, $this->_initializers, $this->_right_brace);
    }

    public function getLeftBrace(): EditableNode
    {
        return $this->_left_brace;
    }

    public function hasInitializers(): bool
    {
        return !$this->_initializers->isMissing();
    }

    public function withInitializers(EditableNode $value): self
    {
        if ($value === $this->_initializers) {
            return $this;
        }

        return new static($this->_name, $this->_left_brace, $value, $this->_right_brace);
    }

    public function getInitializers(): EditableNode
    {
        return $this->_initializers;
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

        return new static($this->_name, $this->_left_brace, $this->_initializers, $value);
    }

    public function getRightBrace(): EditableNode
    {
        return $this->_right_brace;
    }
}
