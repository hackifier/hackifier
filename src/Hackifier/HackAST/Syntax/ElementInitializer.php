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
final class ElementInitializer extends EditableNode
{
    /**
     * @var EditableNode
     */
    private $_key;

    /**
     * @var EditableNode
     */
    private $_arrow;

    /**
     * @var EditableNode
     */
    private $_value;

    public function __construct(EditableNode $key, EditableNode $arrow, EditableNode $value)
    {
        parent::__construct('element_initializer');
        $this->_key = $key;
        $this->_arrow = $arrow;
        $this->_value = $value;
    }

    /**
     * @return array<string, EditableNode>
     */
    public function getChildren(): array
    {
        return ['key' => $this->_key, 'arrow' => $this->_arrow, 'value' => $this->_value];
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
        $key = $this->_key->rewrite($rewriter, $parents);
        $arrow = $this->_arrow->rewrite($rewriter, $parents);
        $value = $this->_value->rewrite($rewriter, $parents);

        if ($key === $this->_key && $arrow === $this->_arrow && $value === $this->_value) {
            return $this;
        }

        return new static($key, $arrow, $value);
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

        return new static($value, $this->_arrow, $this->_value);
    }

    public function getKey(): EditableNode
    {
        return $this->_key;
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

        return new static($this->_key, $value, $this->_value);
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

        return new static($this->_key, $this->_arrow, $value);
    }

    public function getValue(): EditableNode
    {
        return $this->_value;
    }
}
