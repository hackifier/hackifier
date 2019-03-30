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
final class MethodishTraitResolution extends EditableNode
{
    /**
     * @var EditableNode
     */
    private $_attribute;

    /**
     * @var EditableNode
     */
    private $_function_decl_header;

    /**
     * @var EditableNode
     */
    private $_equal;

    /**
     * @var EditableNode
     */
    private $_name;

    /**
     * @var EditableNode
     */
    private $_semicolon;

    public function __construct(EditableNode $attribute, EditableNode $function_decl_header, EditableNode $equal, EditableNode $name, EditableNode $semicolon)
    {
        parent::__construct('methodish_trait_resolution');
        $this->_attribute = $attribute;
        $this->_function_decl_header = $function_decl_header;
        $this->_equal = $equal;
        $this->_name = $name;
        $this->_semicolon = $semicolon;
    }

    /**
     * @return array<string, EditableNode>
     */
    public function getChildren(): array
    {
        return ['attribute' => $this->_attribute, 'function_decl_header' => $this->_function_decl_header, 'equal' => $this->_equal, 'name' => $this->_name, 'semicolon' => $this->_semicolon];
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
        $function_decl_header = $this->_function_decl_header->rewrite($rewriter, $parents);
        $equal = $this->_equal->rewrite($rewriter, $parents);
        $name = $this->_name->rewrite($rewriter, $parents);
        $semicolon = $this->_semicolon->rewrite($rewriter, $parents);

        if ($attribute === $this->_attribute && $function_decl_header === $this->_function_decl_header && $equal === $this->_equal && $name === $this->_name && $semicolon === $this->_semicolon) {
            return $this;
        }

        return new static($attribute, $function_decl_header, $equal, $name, $semicolon);
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

        return new static($value, $this->_function_decl_header, $this->_equal, $this->_name, $this->_semicolon);
    }

    public function getAttribute(): EditableNode
    {
        return $this->_attribute;
    }

    public function hasFunctionDeclHeader(): bool
    {
        return !$this->_function_decl_header->isMissing();
    }

    public function withFunctionDeclHeader(EditableNode $value): self
    {
        if ($value === $this->_function_decl_header) {
            return $this;
        }

        return new static($this->_attribute, $value, $this->_equal, $this->_name, $this->_semicolon);
    }

    public function getFunctionDeclHeader(): EditableNode
    {
        return $this->_function_decl_header;
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

        return new static($this->_attribute, $this->_function_decl_header, $value, $this->_name, $this->_semicolon);
    }

    public function getEqual(): EditableNode
    {
        return $this->_equal;
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

        return new static($this->_attribute, $this->_function_decl_header, $this->_equal, $value, $this->_semicolon);
    }

    public function getName(): EditableNode
    {
        return $this->_name;
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

        return new static($this->_attribute, $this->_function_decl_header, $this->_equal, $this->_name, $value);
    }

    public function getSemicolon(): EditableNode
    {
        return $this->_semicolon;
    }
}
