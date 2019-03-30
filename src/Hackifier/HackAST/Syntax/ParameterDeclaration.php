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
final class ParameterDeclaration extends EditableNode
{
    /**
     * @var EditableNode
     */
    private $_attribute;

    /**
     * @var EditableNode
     */
    private $_visibility;

    /**
     * @var EditableNode
     */
    private $_call_convention;

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
    private $_default_value;

    public function __construct(EditableNode $attribute, EditableNode $visibility, EditableNode $call_convention, EditableNode $type, EditableNode $name, EditableNode $default_value)
    {
        parent::__construct('parameter_declaration');
        $this->_attribute = $attribute;
        $this->_visibility = $visibility;
        $this->_call_convention = $call_convention;
        $this->_type = $type;
        $this->_name = $name;
        $this->_default_value = $default_value;
    }

    /**
     * @return array<string, EditableNode>
     */
    public function getChildren(): array
    {
        return ['attribute' => $this->_attribute, 'visibility' => $this->_visibility, 'call_convention' => $this->_call_convention, 'type' => $this->_type, 'name' => $this->_name, 'default_value' => $this->_default_value];
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
        $attribute = $this->_attribute->rewrite($rewriter, $parents);
        $visibility = $this->_visibility->rewrite($rewriter, $parents);
        $call_convention = $this->_call_convention->rewrite($rewriter, $parents);
        $type = $this->_type->rewrite($rewriter, $parents);
        $name = $this->_name->rewrite($rewriter, $parents);
        $default_value = $this->_default_value->rewrite($rewriter, $parents);

        if ($attribute === $this->_attribute && $visibility === $this->_visibility && $call_convention === $this->_call_convention && $type === $this->_type && $name === $this->_name && $default_value === $this->_default_value) {
            return $this;
        }

        return new static($attribute, $visibility, $call_convention, $type, $name, $default_value);
    }

    public function hasAttribute(): bool
    {
        return !$this->_attribute->isMissing();
    }

    public function withAttribute(EditableNode $value): self
    {
        if ($value === $this->_attribute) {
            return $this;
        }

        return new static($value, $this->_visibility, $this->_call_convention, $this->_type, $this->_name, $this->_default_value);
    }

    public function getAttribute(): EditableNode
    {
        return $this->_attribute;
    }

    public function hasVisibility(): bool
    {
        return !$this->_visibility->isMissing();
    }

    public function withVisibility(EditableNode $value): self
    {
        if ($value === $this->_visibility) {
            return $this;
        }

        return new static($this->_attribute, $value, $this->_call_convention, $this->_type, $this->_name, $this->_default_value);
    }

    public function getVisibility(): EditableNode
    {
        return $this->_visibility;
    }

    public function hasCallConvention(): bool
    {
        return !$this->_call_convention->isMissing();
    }

    public function withCallConvention(EditableNode $value): self
    {
        if ($value === $this->_call_convention) {
            return $this;
        }

        return new static($this->_attribute, $this->_visibility, $value, $this->_type, $this->_name, $this->_default_value);
    }

    public function getCallConvention(): EditableNode
    {
        return $this->_call_convention;
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

        return new static($this->_attribute, $this->_visibility, $this->_call_convention, $value, $this->_name, $this->_default_value);
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

        return new static($this->_attribute, $this->_visibility, $this->_call_convention, $this->_type, $value, $this->_default_value);
    }

    public function getName(): EditableNode
    {
        return $this->_name;
    }

    public function hasDefaultValue(): bool
    {
        return !$this->_default_value->isMissing();
    }

    public function withDefaultValue(EditableNode $value): self
    {
        if ($value === $this->_default_value) {
            return $this;
        }

        return new static($this->_attribute, $this->_visibility, $this->_call_convention, $this->_type, $this->_name, $value);
    }

    public function getDefaultValue(): EditableNode
    {
        return $this->_default_value;
    }
}
