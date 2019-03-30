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
final class Enumerator extends EditableNode
{
    /**
     * @var EditableNode
     */
    private $_name;

    /**
     * @var EditableNode
     */
    private $_equal;

    /**
     * @var EditableNode
     */
    private $_value;

    /**
     * @var EditableNode
     */
    private $_semicolon;

    public function __construct(EditableNode $name, EditableNode $equal, EditableNode $value, EditableNode $semicolon)
    {
        parent::__construct('enumerator');
        $this->_name = $name;
        $this->_equal = $equal;
        $this->_value = $value;
        $this->_semicolon = $semicolon;
    }

    /**
     * @return array<string, EditableNode>
     */
    public function getChildren(): array
    {
        return ['name' => $this->_name, 'equal' => $this->_equal, 'value' => $this->_value, 'semicolon' => $this->_semicolon];
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
        $equal = $this->_equal->rewrite($rewriter, $parents);
        $value = $this->_value->rewrite($rewriter, $parents);
        $semicolon = $this->_semicolon->rewrite($rewriter, $parents);

        if ($name === $this->_name && $equal === $this->_equal && $value === $this->_value && $semicolon === $this->_semicolon) {
            return $this;
        }

        return new static($name, $equal, $value, $semicolon);
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

        return new static($value, $this->_equal, $this->_value, $this->_semicolon);
    }

    public function getName(): EditableNode
    {
        return $this->_name;
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

        return new static($this->_name, $value, $this->_value, $this->_semicolon);
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

        return new static($this->_name, $this->_equal, $value, $this->_semicolon);
    }

    public function getValue(): EditableNode
    {
        return $this->_value;
    }

    public function hasSemicolon(): bool
    {
        return !$this->_semicolon->isMissing();
    }

    public function withSemicolon(EditableNode $value): self
    {
        if ($value === $this->_semicolon) {
            return $this;
        }

        return new static($this->_name, $this->_equal, $this->_value, $value);
    }

    public function getSemicolon(): EditableNode
    {
        return $this->_semicolon;
    }
}
