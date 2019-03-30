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
final class ConstDeclaration extends EditableNode
{
    /**
     * @var EditableNode
     */
    private $_visibility;

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
    private $_type_specifier;

    /**
     * @var EditableNode
     */
    private $_declarators;

    /**
     * @var EditableNode
     */
    private $_semicolon;

    public function __construct(EditableNode $visibility, EditableNode $abstract, EditableNode $keyword, EditableNode $type_specifier, EditableNode $declarators, EditableNode $semicolon)
    {
        parent::__construct('const_declaration');
        $this->_visibility = $visibility;
        $this->_abstract = $abstract;
        $this->_keyword = $keyword;
        $this->_type_specifier = $type_specifier;
        $this->_declarators = $declarators;
        $this->_semicolon = $semicolon;
    }

    /**
     * @return array<string, EditableNode>
     */
    public function getChildren(): array
    {
        return ['visibility' => $this->_visibility, 'abstract' => $this->_abstract, 'keyword' => $this->_keyword, 'type_specifier' => $this->_type_specifier, 'declarators' => $this->_declarators, 'semicolon' => $this->_semicolon];
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
        $visibility = $this->_visibility->rewrite($rewriter, $parents);
        $abstract = $this->_abstract->rewrite($rewriter, $parents);
        $keyword = $this->_keyword->rewrite($rewriter, $parents);
        $type_specifier = $this->_type_specifier->rewrite($rewriter, $parents);
        $declarators = $this->_declarators->rewrite($rewriter, $parents);
        $semicolon = $this->_semicolon->rewrite($rewriter, $parents);

        if ($visibility === $this->_visibility && $abstract === $this->_abstract && $keyword === $this->_keyword && $type_specifier === $this->_type_specifier && $declarators === $this->_declarators && $semicolon === $this->_semicolon) {
            return $this;
        }

        return new static($visibility, $abstract, $keyword, $type_specifier, $declarators, $semicolon);
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

        return new static($value, $this->_abstract, $this->_keyword, $this->_type_specifier, $this->_declarators, $this->_semicolon);
    }

    public function getVisibility(): EditableNode
    {
        return $this->_visibility;
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

        return new static($this->_visibility, $value, $this->_keyword, $this->_type_specifier, $this->_declarators, $this->_semicolon);
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

        return new static($this->_visibility, $this->_abstract, $value, $this->_type_specifier, $this->_declarators, $this->_semicolon);
    }

    public function getKeyword(): EditableNode
    {
        return $this->_keyword;
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

        return new static($this->_visibility, $this->_abstract, $this->_keyword, $value, $this->_declarators, $this->_semicolon);
    }

    public function getTypeSpecifier(): EditableNode
    {
        return $this->_type_specifier;
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

        return new static($this->_visibility, $this->_abstract, $this->_keyword, $this->_type_specifier, $value, $this->_semicolon);
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

        return new static($this->_visibility, $this->_abstract, $this->_keyword, $this->_type_specifier, $this->_declarators, $value);
    }

    public function getSemicolon(): EditableNode
    {
        return $this->_semicolon;
    }
}
