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
final class XHPClassAttribute extends EditableNode
{
    /**
     * @var EditableNode
     */
    private $_type;

    /**
     * @var EditableNode
     */
    private $_name;

    /**
     * @var EditableNode
     */
    private $_initializer;

    /**
     * @var EditableNode
     */
    private $_required;

    public function __construct(EditableNode $type, EditableNode $name, EditableNode $initializer, EditableNode $required)
    {
        parent::__construct('xhp_class_attribute');
        $this->_type = $type;
        $this->_name = $name;
        $this->_initializer = $initializer;
        $this->_required = $required;
    }

    /**
     * @return array<string, EditableNode>
     */
    public function getChildren(): array
    {
        return ['type' => $this->_type, 'name' => $this->_name, 'initializer' => $this->_initializer, 'required' => $this->_required];
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
        $type = $this->_type->rewrite($rewriter, $parents);
        $name = $this->_name->rewrite($rewriter, $parents);
        $initializer = $this->_initializer->rewrite($rewriter, $parents);
        $required = $this->_required->rewrite($rewriter, $parents);

        if ($type === $this->_type && $name === $this->_name && $initializer === $this->_initializer && $required === $this->_required) {
            return $this;
        }

        return new static($type, $name, $initializer, $required);
    }

    public function hasType(): bool
    {
        return !$this->_type->isMissing();
    }

    public function withType(EditableNode $value): self
    {
        if ($value === $this->_type) {
            return $this;
        }

        return new static($value, $this->_name, $this->_initializer, $this->_required);
    }

    public function getType(): EditableNode
    {
        return $this->_type;
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

        return new static($this->_type, $value, $this->_initializer, $this->_required);
    }

    public function getName(): EditableNode
    {
        return $this->_name;
    }

    public function hasInitializer(): bool
    {
        return !$this->_initializer->isMissing();
    }

    public function withInitializer(EditableNode $value): self
    {
        if ($value === $this->_initializer) {
            return $this;
        }

        return new static($this->_type, $this->_name, $value, $this->_required);
    }

    public function getInitializer(): EditableNode
    {
        return $this->_initializer;
    }

    public function hasRequired(): bool
    {
        return !$this->_required->isMissing();
    }

    public function withRequired(EditableNode $value): self
    {
        if ($value === $this->_required) {
            return $this;
        }

        return new static($this->_type, $this->_name, $this->_initializer, $value);
    }

    public function getRequired(): EditableNode
    {
        return $this->_required;
    }
}
