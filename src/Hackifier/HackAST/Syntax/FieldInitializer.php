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
final class FieldInitializer extends EditableNode
{
    /**
     * @var EditableNode
     */
    private $_name;

    /**
     * @var EditableNode
     */
    private $_arrow;

    /**
     * @var EditableNode
     */
    private $_value;

    public function __construct(EditableNode $name, EditableNode $arrow, EditableNode $value)
    {
        parent::__construct('field_initializer');
        $this->_name = $name;
        $this->_arrow = $arrow;
        $this->_value = $value;
    }

    /**
     * @return array<string, EditableNode>
     */
    public function getChildren(): array
    {
        return ['name' => $this->_name, 'arrow' => $this->_arrow, 'value' => $this->_value];
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
        $arrow = $this->_arrow->rewrite($rewriter, $parents);
        $value = $this->_value->rewrite($rewriter, $parents);

        if ($name === $this->_name && $arrow === $this->_arrow && $value === $this->_value) {
            return $this;
        }

        return new static($name, $arrow, $value);
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

        return new static($value, $this->_arrow, $this->_value);
    }

    public function getName(): EditableNode
    {
        return $this->_name;
    }

    public function hasArrow(): bool
    {
        return !$this->_arrow->isMissing();
    }

    public function withArrow(EditableNode $value): self
    {
        if ($value === $this->_arrow) {
            return $this;
        }

        return new static($this->_name, $value, $this->_value);
    }

    public function getArrow(): EditableNode
    {
        return $this->_arrow;
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

        return new static($this->_name, $this->_arrow, $value);
    }

    public function getValue(): EditableNode
    {
        return $this->_value;
    }
}
