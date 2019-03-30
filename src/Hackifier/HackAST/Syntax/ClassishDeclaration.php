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
final class ClassishDeclaration extends EditableNode
{
    /**
     * @var EditableNode
     */
    private $_attribute;

    /**
     * @var EditableNode
     */
    private $_modifiers;

    /**
     * @var EditableNode
     */
    private $_keyword;

    /**
     * @var EditableNode
     */
    private $_name;

    /**
     * @var EditableNode
     */
    private $_type_parameters;

    /**
     * @var EditableNode
     */
    private $_extends_keyword;

    /**
     * @var EditableNode
     */
    private $_extends_list;

    /**
     * @var EditableNode
     */
    private $_implements_keyword;

    /**
     * @var EditableNode
     */
    private $_implements_list;

    /**
     * @var EditableNode
     */
    private $_body;

    public function __construct(EditableNode $attribute, EditableNode $modifiers, EditableNode $keyword, EditableNode $name, EditableNode $type_parameters, EditableNode $extends_keyword, EditableNode $extends_list, EditableNode $implements_keyword, EditableNode $implements_list, EditableNode $body)
    {
        parent::__construct('classish_declaration');
        $this->_attribute = $attribute;
        $this->_modifiers = $modifiers;
        $this->_keyword = $keyword;
        $this->_name = $name;
        $this->_type_parameters = $type_parameters;
        $this->_extends_keyword = $extends_keyword;
        $this->_extends_list = $extends_list;
        $this->_implements_keyword = $implements_keyword;
        $this->_implements_list = $implements_list;
        $this->_body = $body;
    }

    /**
     * @return array<string, EditableNode>
     */
    public function getChildren(): array
    {
        return ['attribute' => $this->_attribute, 'modifiers' => $this->_modifiers, 'keyword' => $this->_keyword, 'name' => $this->_name, 'type_parameters' => $this->_type_parameters, 'extends_keyword' => $this->_extends_keyword, 'extends_list' => $this->_extends_list, 'implements_keyword' => $this->_implements_keyword, 'implements_list' => $this->_implements_list, 'body' => $this->_body];
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
        $modifiers = $this->_modifiers->rewrite($rewriter, $parents);
        $keyword = $this->_keyword->rewrite($rewriter, $parents);
        $name = $this->_name->rewrite($rewriter, $parents);
        $type_parameters = $this->_type_parameters->rewrite($rewriter, $parents);
        $extends_keyword = $this->_extends_keyword->rewrite($rewriter, $parents);
        $extends_list = $this->_extends_list->rewrite($rewriter, $parents);
        $implements_keyword = $this->_implements_keyword->rewrite($rewriter, $parents);
        $implements_list = $this->_implements_list->rewrite($rewriter, $parents);
        $body = $this->_body->rewrite($rewriter, $parents);

        if ($attribute === $this->_attribute && $modifiers === $this->_modifiers && $keyword === $this->_keyword && $name === $this->_name && $type_parameters === $this->_type_parameters && $extends_keyword === $this->_extends_keyword && $extends_list === $this->_extends_list && $implements_keyword === $this->_implements_keyword && $implements_list === $this->_implements_list && $body === $this->_body) {
            return $this;
        }

        return new static($attribute, $modifiers, $keyword, $name, $type_parameters, $extends_keyword, $extends_list, $implements_keyword, $implements_list, $body);
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

        return new static($value, $this->_modifiers, $this->_keyword, $this->_name, $this->_type_parameters, $this->_extends_keyword, $this->_extends_list, $this->_implements_keyword, $this->_implements_list, $this->_body);
    }

    public function getAttribute(): EditableNode
    {
        return $this->_attribute;
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

        return new static($this->_attribute, $value, $this->_keyword, $this->_name, $this->_type_parameters, $this->_extends_keyword, $this->_extends_list, $this->_implements_keyword, $this->_implements_list, $this->_body);
    }

    public function getModifiers(): EditableNode
    {
        return $this->_modifiers;
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

        return new static($this->_attribute, $this->_modifiers, $value, $this->_name, $this->_type_parameters, $this->_extends_keyword, $this->_extends_list, $this->_implements_keyword, $this->_implements_list, $this->_body);
    }

    public function getKeyword(): EditableNode
    {
        return $this->_keyword;
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

        return new static($this->_attribute, $this->_modifiers, $this->_keyword, $value, $this->_type_parameters, $this->_extends_keyword, $this->_extends_list, $this->_implements_keyword, $this->_implements_list, $this->_body);
    }

    public function getName(): EditableNode
    {
        return $this->_name;
    }

    public function hasTypeParameters(): bool
    {
        return !$this->_type_parameters->isMissing();
    }

    public function withTypeParameters(EditableNode $value): self
    {
        if ($value === $this->_type_parameters) {
            return $this;
        }

        return new static($this->_attribute, $this->_modifiers, $this->_keyword, $this->_name, $value, $this->_extends_keyword, $this->_extends_list, $this->_implements_keyword, $this->_implements_list, $this->_body);
    }

    public function getTypeParameters(): EditableNode
    {
        return $this->_type_parameters;
    }

    public function hasExtendsKeyword(): bool
    {
        return !$this->_extends_keyword->isMissing();
    }

    public function withExtendsKeyword(EditableNode $value): self
    {
        if ($value === $this->_extends_keyword) {
            return $this;
        }

        return new static($this->_attribute, $this->_modifiers, $this->_keyword, $this->_name, $this->_type_parameters, $value, $this->_extends_list, $this->_implements_keyword, $this->_implements_list, $this->_body);
    }

    public function getExtendsKeyword(): EditableNode
    {
        return $this->_extends_keyword;
    }

    public function hasExtendsList(): bool
    {
        return !$this->_extends_list->isMissing();
    }

    public function withExtendsList(EditableNode $value): self
    {
        if ($value === $this->_extends_list) {
            return $this;
        }

        return new static($this->_attribute, $this->_modifiers, $this->_keyword, $this->_name, $this->_type_parameters, $this->_extends_keyword, $value, $this->_implements_keyword, $this->_implements_list, $this->_body);
    }

    public function getExtendsList(): EditableNode
    {
        return $this->_extends_list;
    }

    public function hasImplementsKeyword(): bool
    {
        return !$this->_implements_keyword->isMissing();
    }

    public function withImplementsKeyword(EditableNode $value): self
    {
        if ($value === $this->_implements_keyword) {
            return $this;
        }

        return new static($this->_attribute, $this->_modifiers, $this->_keyword, $this->_name, $this->_type_parameters, $this->_extends_keyword, $this->_extends_list, $value, $this->_implements_list, $this->_body);
    }

    public function getImplementsKeyword(): EditableNode
    {
        return $this->_implements_keyword;
    }

    public function hasImplementsList(): bool
    {
        return !$this->_implements_list->isMissing();
    }

    public function withImplementsList(EditableNode $value): self
    {
        if ($value === $this->_implements_list) {
            return $this;
        }

        return new static($this->_attribute, $this->_modifiers, $this->_keyword, $this->_name, $this->_type_parameters, $this->_extends_keyword, $this->_extends_list, $this->_implements_keyword, $value, $this->_body);
    }

    public function getImplementsList(): EditableNode
    {
        return $this->_implements_list;
    }

    public function hasBody(): bool
    {
        return !$this->_body->isMissing();
    }

    public function withBody(EditableNode $value): self
    {
        if ($value === $this->_body) {
            return $this;
        }

        return new static($this->_attribute, $this->_modifiers, $this->_keyword, $this->_name, $this->_type_parameters, $this->_extends_keyword, $this->_extends_list, $this->_implements_keyword, $this->_implements_list, $value);
    }

    public function getBody(): EditableNode
    {
        return $this->_body;
    }
}
