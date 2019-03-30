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
final class FunctionDeclaration extends EditableNode implements IFunctionishDeclaration
{
    /**
     * @var EditableNode
     */
    private $_attribute_spec;

    /**
     * @var EditableNode
     */
    private $_declaration_header;

    /**
     * @var EditableNode
     */
    private $_body;

    public function __construct(EditableNode $attribute_spec, EditableNode $declaration_header, EditableNode $body)
    {
        parent::__construct('function_declaration');
        $this->_attribute_spec = $attribute_spec;
        $this->_declaration_header = $declaration_header;
        $this->_body = $body;
    }

    /**
     * @return array<string, EditableNode>
     */
    public function getChildren(): array
    {
        return ['attribute_spec' => $this->_attribute_spec, 'declaration_header' => $this->_declaration_header, 'body' => $this->_body];
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
        $declaration_header = $this->_declaration_header->rewrite($rewriter, $parents);
        $body = $this->_body->rewrite($rewriter, $parents);

        if ($attribute_spec === $this->_attribute_spec && $declaration_header === $this->_declaration_header && $body === $this->_body) {
            return $this;
        }

        return new static($attribute_spec, $declaration_header, $body);
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

        return new static($value, $this->_declaration_header, $this->_body);
    }

    public function getAttributeSpec(): EditableNode
    {
        return $this->_attribute_spec;
    }

    public function hasDeclarationHeader(): bool
    {
        return !$this->_declaration_header->isMissing();
    }

    public function withDeclarationHeader(EditableNode $value): self
    {
        if ($value === $this->_declaration_header) {
            return $this;
        }

        return new static($this->_attribute_spec, $value, $this->_body);
    }

    public function getDeclarationHeader(): EditableNode
    {
        return $this->_declaration_header;
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

        return new static($this->_attribute_spec, $this->_declaration_header, $value);
    }

    public function getBody(): EditableNode
    {
        return $this->_body;
    }
}
