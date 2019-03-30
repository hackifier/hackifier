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
use Hackifier\HackAST\IFunctionishDeclaration;

/**
 * This class is generated. Do not modify it manually!
 *
 * @version 2018-11-27-0001
 */
final class MethodishDeclaration extends EditableNode implements IFunctionishDeclaration
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
    private $_function_body;

    /**
     * @var EditableNode
     */
    private $_semicolon;

    public function __construct(EditableNode $attribute, EditableNode $function_decl_header, EditableNode $function_body, EditableNode $semicolon)
    {
        parent::__construct('methodish_declaration');
        $this->_attribute = $attribute;
        $this->_function_decl_header = $function_decl_header;
        $this->_function_body = $function_body;
        $this->_semicolon = $semicolon;
    }

    /**
     * @return array<string, EditableNode>
     */
    public function getChildren(): array
    {
        return ['attribute' => $this->_attribute, 'function_decl_header' => $this->_function_decl_header, 'function_body' => $this->_function_body, 'semicolon' => $this->_semicolon];
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
        $function_body = $this->_function_body->rewrite($rewriter, $parents);
        $semicolon = $this->_semicolon->rewrite($rewriter, $parents);

        if ($attribute === $this->_attribute && $function_decl_header === $this->_function_decl_header && $function_body === $this->_function_body && $semicolon === $this->_semicolon) {
            return $this;
        }

        return new static($attribute, $function_decl_header, $function_body, $semicolon);
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

        return new static($value, $this->_function_decl_header, $this->_function_body, $this->_semicolon);
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

        return new static($this->_attribute, $value, $this->_function_body, $this->_semicolon);
    }

    public function getFunctionDeclHeader(): EditableNode
    {
        return $this->_function_decl_header;
    }

    public function hasFunctionBody(): bool
    {
        return !$this->_function_body->isMissing();
    }

    public function withFunctionBody(EditableNode $value): self
    {
        if ($value === $this->_function_body) {
            return $this;
        }

        return new static($this->_attribute, $this->_function_decl_header, $value, $this->_semicolon);
    }

    public function getFunctionBody(): EditableNode
    {
        return $this->_function_body;
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

        return new static($this->_attribute, $this->_function_decl_header, $this->_function_body, $value);
    }

    public function getSemicolon(): EditableNode
    {
        return $this->_semicolon;
    }
}
