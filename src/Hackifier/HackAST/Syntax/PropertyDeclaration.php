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
final class PropertyDeclaration extends EditableNode
{
    /**
     * @var EditableNode
     */
    private $_attribute_spec;

    /**
     * @var EditableNode
     */
    private $_modifiers;

    /**
     * @var EditableNode
     */
    private $_type;

    /**
     * @var EditableNode
     */
    private $_declarators;

    /**
     * @var EditableNode
     */
    private $_semicolon;

    public function __construct(EditableNode $attribute_spec, EditableNode $modifiers, EditableNode $type, EditableNode $declarators, EditableNode $semicolon)
    {
        parent::__construct('property_declaration');
        $this->_attribute_spec = $attribute_spec;
        $this->_modifiers = $modifiers;
        $this->_type = $type;
        $this->_declarators = $declarators;
        $this->_semicolon = $semicolon;
    }

    /**
     * @return array<string, EditableNode>
     */
    public function getChildren(): array
    {
        return ['attribute_spec' => $this->_attribute_spec, 'modifiers' => $this->_modifiers, 'type' => $this->_type, 'declarators' => $this->_declarators, 'semicolon' => $this->_semicolon];
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
        $attribute_spec = $this->_attribute_spec->rewrite($rewriter, $parents);
        $modifiers = $this->_modifiers->rewrite($rewriter, $parents);
        $type = $this->_type->rewrite($rewriter, $parents);
        $declarators = $this->_declarators->rewrite($rewriter, $parents);
        $semicolon = $this->_semicolon->rewrite($rewriter, $parents);

        if ($attribute_spec === $this->_attribute_spec && $modifiers === $this->_modifiers && $type === $this->_type && $declarators === $this->_declarators && $semicolon === $this->_semicolon) {
            return $this;
        }

        return new static($attribute_spec, $modifiers, $type, $declarators, $semicolon);
    }

    public function hasAttributeSpec(): bool
    {
        return !$this->_attribute_spec->isMissing();
    }

    public function withAttributeSpec(EditableNode $value): self
    {
        if ($value === $this->_attribute_spec) {
            return $this;
        }

        return new static($value, $this->_modifiers, $this->_type, $this->_declarators, $this->_semicolon);
    }

    public function getAttributeSpec(): EditableNode
    {
        return $this->_attribute_spec;
    }

    public function hasModifiers(): bool
    {
        return !$this->_modifiers->isMissing();
    }

    public function withModifiers(EditableNode $value): self
    {
        if ($value === $this->_modifiers) {
            return $this;
        }

        return new static($this->_attribute_spec, $value, $this->_type, $this->_declarators, $this->_semicolon);
    }

    public function getModifiers(): EditableNode
    {
        return $this->_modifiers;
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

        return new static($this->_attribute_spec, $this->_modifiers, $value, $this->_declarators, $this->_semicolon);
    }

    public function getType(): EditableNode
    {
        return $this->_type;
    }

    public function hasDeclarators(): bool
    {
        return !$this->_declarators->isMissing();
    }

    public function withDeclarators(EditableNode $value): self
    {
        if ($value === $this->_declarators) {
            return $this;
        }

        return new static($this->_attribute_spec, $this->_modifiers, $this->_type, $value, $this->_semicolon);
    }

    public function getDeclarators(): EditableNode
    {
        return $this->_declarators;
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

        return new static($this->_attribute_spec, $this->_modifiers, $this->_type, $this->_declarators, $value);
    }

    public function getSemicolon(): EditableNode
    {
        return $this->_semicolon;
    }
}
