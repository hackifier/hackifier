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
final class AliasDeclaration extends EditableNode
{
    /**
     * @var EditableNode
     */
    private $_attribute_spec;

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
    private $_generic_parameter;

    /**
     * @var EditableNode
     */
    private $_constraint;

    /**
     * @var EditableNode
     */
    private $_equal;

    /**
     * @var EditableNode
     */
    private $_type;

    /**
     * @var EditableNode
     */
    private $_semicolon;

    public function __construct(EditableNode $attribute_spec, EditableNode $keyword, EditableNode $name, EditableNode $generic_parameter, EditableNode $constraint, EditableNode $equal, EditableNode $type, EditableNode $semicolon)
    {
        parent::__construct('alias_declaration');
        $this->_attribute_spec = $attribute_spec;
        $this->_keyword = $keyword;
        $this->_name = $name;
        $this->_generic_parameter = $generic_parameter;
        $this->_constraint = $constraint;
        $this->_equal = $equal;
        $this->_type = $type;
        $this->_semicolon = $semicolon;
    }

    /**
     * @return array<string, EditableNode>
     */
    public function getChildren(): array
    {
        return ['attribute_spec' => $this->_attribute_spec, 'keyword' => $this->_keyword, 'name' => $this->_name, 'generic_parameter' => $this->_generic_parameter, 'constraint' => $this->_constraint, 'equal' => $this->_equal, 'type' => $this->_type, 'semicolon' => $this->_semicolon];
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
        $keyword = $this->_keyword->rewrite($rewriter, $parents);
        $name = $this->_name->rewrite($rewriter, $parents);
        $generic_parameter = $this->_generic_parameter->rewrite($rewriter, $parents);
        $constraint = $this->_constraint->rewrite($rewriter, $parents);
        $equal = $this->_equal->rewrite($rewriter, $parents);
        $type = $this->_type->rewrite($rewriter, $parents);
        $semicolon = $this->_semicolon->rewrite($rewriter, $parents);

        if ($attribute_spec === $this->_attribute_spec && $keyword === $this->_keyword && $name === $this->_name && $generic_parameter === $this->_generic_parameter && $constraint === $this->_constraint && $equal === $this->_equal && $type === $this->_type && $semicolon === $this->_semicolon) {
            return $this;
        }

        return new static($attribute_spec, $keyword, $name, $generic_parameter, $constraint, $equal, $type, $semicolon);
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

        return new static($value, $this->_keyword, $this->_name, $this->_generic_parameter, $this->_constraint, $this->_equal, $this->_type, $this->_semicolon);
    }

    public function getAttributeSpec(): EditableNode
    {
        return $this->_attribute_spec;
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

        return new static($this->_attribute_spec, $value, $this->_name, $this->_generic_parameter, $this->_constraint, $this->_equal, $this->_type, $this->_semicolon);
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

        return new static($this->_attribute_spec, $this->_keyword, $value, $this->_generic_parameter, $this->_constraint, $this->_equal, $this->_type, $this->_semicolon);
    }

    public function getName(): EditableNode
    {
        return $this->_name;
    }

    public function hasGenericParameter(): bool
    {
        return !$this->_generic_parameter->isMissing();
    }

    public function withGenericParameter(EditableNode $value): self
    {
        if ($value === $this->_generic_parameter) {
            return $this;
        }

        return new static($this->_attribute_spec, $this->_keyword, $this->_name, $value, $this->_constraint, $this->_equal, $this->_type, $this->_semicolon);
    }

    public function getGenericParameter(): EditableNode
    {
        return $this->_generic_parameter;
    }

    public function hasConstraint(): bool
    {
        return !$this->_constraint->isMissing();
    }

    public function withConstraint(EditableNode $value): self
    {
        if ($value === $this->_constraint) {
            return $this;
        }

        return new static($this->_attribute_spec, $this->_keyword, $this->_name, $this->_generic_parameter, $value, $this->_equal, $this->_type, $this->_semicolon);
    }

    public function getConstraint(): EditableNode
    {
        return $this->_constraint;
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

        return new static($this->_attribute_spec, $this->_keyword, $this->_name, $this->_generic_parameter, $this->_constraint, $value, $this->_type, $this->_semicolon);
    }

    public function getEqual(): EditableNode
    {
        return $this->_equal;
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

        return new static($this->_attribute_spec, $this->_keyword, $this->_name, $this->_generic_parameter, $this->_constraint, $this->_equal, $value, $this->_semicolon);
    }

    public function getType(): EditableNode
    {
        return $this->_type;
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

        return new static($this->_attribute_spec, $this->_keyword, $this->_name, $this->_generic_parameter, $this->_constraint, $this->_equal, $this->_type, $value);
    }

    public function getSemicolon(): EditableNode
    {
        return $this->_semicolon;
    }
}
