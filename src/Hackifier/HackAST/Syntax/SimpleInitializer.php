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
final class SimpleInitializer extends EditableNode
{
    /**
     * @var EditableNode
     */
    private $_equal;

    /**
     * @var EditableNode
     */
    private $_value;

    public function __construct(EditableNode $equal, EditableNode $value)
    {
        parent::__construct('simple_initializer');
        $this->_equal = $equal;
        $this->_value = $value;
    }

    /**
     * @return array<string, EditableNode>
     */
    public function getChildren(): array
    {
        return ['equal' => $this->_equal, 'value' => $this->_value];
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
        $equal = $this->_equal->rewrite($rewriter, $parents);
        $value = $this->_value->rewrite($rewriter, $parents);

        if ($equal === $this->_equal && $value === $this->_value) {
            return $this;
        }

        return new static($equal, $value);
    }

    public function hasEqual(): bool
    {
        return !$this->_equal->isMissing();
    }

    public function withEqual(EditableNode $value): self
    {
        if ($value === $this->_equal) {
            return $this;
        }

        return new static($value, $this->_value);
    }

    public function getEqual(): EditableNode
    {
        return $this->_equal;
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

        return new static($this->_equal, $value);
    }

    public function getValue(): EditableNode
    {
        return $this->_value;
    }
}
