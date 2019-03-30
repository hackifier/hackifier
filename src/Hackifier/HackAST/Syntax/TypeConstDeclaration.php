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
final class TypeConstDeclaration extends EditableNode
{
    /**
     * @var EditableNode
     */
    private $_abstract;

    /**
     * @var EditableNode
     */
    private $_keyword;

    /**
     * @var EditableNode
     */
    private $_type_keyword;

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
    private $_type_constraint;

    /**
     * @var EditableNode
     */
    private $_equal;

    /**
     * @var EditableNode
     */
    private $_type_specifier;

    /**
     * @var EditableNode
     */
    private $_semicolon;

    public function __construct(EditableNode $abstract, EditableNode $keyword, EditableNode $type_keyword, EditableNode $name, EditableNode $type_parameters, EditableNode $type_constraint, EditableNode $equal, EditableNode $type_specifier, EditableNode $semicolon)
    {
        parent::__construct('type_const_declaration');
        $this->_abstract = $abstract;
        $this->_keyword = $keyword;
        $this->_type_keyword = $type_keyword;
        $this->_name = $name;
        $this->_type_parameters = $type_parameters;
        $this->_type_constraint = $type_constraint;
        $this->_equal = $equal;
        $this->_type_specifier = $type_specifier;
        $this->_semicolon = $semicolon;
    }

    /**
     * @return array<string, EditableNode>
     */
    public function getChildren(): array
    {
        return ['abstract' => $this->_abstract, 'keyword' => $this->_keyword, 'type_keyword' => $this->_type_keyword, 'name' => $this->_name, 'type_parameters' => $this->_type_parameters, 'type_constraint' => $this->_type_constraint, 'equal' => $this->_equal, 'type_specifier' => $this->_type_specifier, 'semicolon' => $this->_semicolon];
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
        $abstract = $this->_abstract->rewrite($rewriter, $parents);
        $keyword = $this->_keyword->rewrite($rewriter, $parents);
        $type_keyword = $this->_type_keyword->rewrite($rewriter, $parents);
        $name = $this->_name->rewrite($rewriter, $parents);
        $type_parameters = $this->_type_parameters->rewrite($rewriter, $parents);
        $type_constraint = $this->_type_constraint->rewrite($rewriter, $parents);
        $equal = $this->_equal->rewrite($rewriter, $parents);
        $type_specifier = $this->_type_specifier->rewrite($rewriter, $parents);
        $semicolon = $this->_semicolon->rewrite($rewriter, $parents);

        if ($abstract === $this->_abstract && $keyword === $this->_keyword && $type_keyword === $this->_type_keyword && $name === $this->_name && $type_parameters === $this->_type_parameters && $type_constraint === $this->_type_constraint && $equal === $this->_equal && $type_specifier === $this->_type_specifier && $semicolon === $this->_semicolon) {
            return $this;
        }

        return new static($abstract, $keyword, $type_keyword, $name, $type_parameters, $type_constraint, $equal, $type_specifier, $semicolon);
    }

    public function hasAbstract(): bool
    {
        return !$this->_abstract->isMissing();
    }

    public function withAbstract(EditableNode $value): self
    {
        if ($value === $this->_abstract) {
            return $this;
        }

        return new static($value, $this->_keyword, $this->_type_keyword, $this->_name, $this->_type_parameters, $this->_type_constraint, $this->_equal, $this->_type_specifier, $this->_semicolon);
    }

    public function getAbstract(): EditableNode
    {
        return $this->_abstract;
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

        return new static($this->_abstract, $value, $this->_type_keyword, $this->_name, $this->_type_parameters, $this->_type_constraint, $this->_equal, $this->_type_specifier, $this->_semicolon);
    }

    public function getKeyword(): EditableNode
    {
        return $this->_keyword;
    }

    public function hasTypeKeyword(): bool
    {
        return !$this->_type_keyword->isMissing();
    }

    public function withTypeKeyword(EditableNode $value): self
    {
        if ($value === $this->_type_keyword) {
            return $this;
        }

        return new static($this->_abstract, $this->_keyword, $value, $this->_name, $this->_type_parameters, $this->_type_constraint, $this->_equal, $this->_type_specifier, $this->_semicolon);
    }

    public function getTypeKeyword(): EditableNode
    {
        return $this->_type_keyword;
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

        return new static($this->_abstract, $this->_keyword, $this->_type_keyword, $value, $this->_type_parameters, $this->_type_constraint, $this->_equal, $this->_type_specifier, $this->_semicolon);
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

        return new static($this->_abstract, $this->_keyword, $this->_type_keyword, $this->_name, $value, $this->_type_constraint, $this->_equal, $this->_type_specifier, $this->_semicolon);
    }

    public function getTypeParameters(): EditableNode
    {
        return $this->_type_parameters;
    }

    public function hasTypeConstraint(): bool
    {
        return !$this->_type_constraint->isMissing();
    }

    public function withTypeConstraint(EditableNode $value): self
    {
        if ($value === $this->_type_constraint) {
            return $this;
        }

        return new static($this->_abstract, $this->_keyword, $this->_type_keyword, $this->_name, $this->_type_parameters, $value, $this->_equal, $this->_type_specifier, $this->_semicolon);
    }

    public function getTypeConstraint(): EditableNode
    {
        return $this->_type_constraint;
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

        return new static($this->_abstract, $this->_keyword, $this->_type_keyword, $this->_name, $this->_type_parameters, $this->_type_constraint, $value, $this->_type_specifier, $this->_semicolon);
    }

    public function getEqual(): EditableNode
    {
        return $this->_equal;
    }

    public function hasTypeSpecifier(): bool
    {
        return !$this->_type_specifier->isMissing();
    }

    public function withTypeSpecifier(EditableNode $value): self
    {
        if ($value === $this->_type_specifier) {
            return $this;
        }

        return new static($this->_abstract, $this->_keyword, $this->_type_keyword, $this->_name, $this->_type_parameters, $this->_type_constraint, $this->_equal, $value, $this->_semicolon);
    }

    public function getTypeSpecifier(): EditableNode
    {
        return $this->_type_specifier;
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

        return new static($this->_abstract, $this->_keyword, $this->_type_keyword, $this->_name, $this->_type_parameters, $this->_type_constraint, $this->_equal, $this->_type_specifier, $value);
    }

    public function getSemicolon(): EditableNode
    {
        return $this->_semicolon;
    }
}
