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
final class TraitUseAliasItem extends EditableNode
{
    /**
     * @var EditableNode
     */
    private $_aliasing_name;

    /**
     * @var EditableNode
     */
    private $_keyword;

    /**
     * @var EditableNode
     */
    private $_modifiers;

    /**
     * @var EditableNode
     */
    private $_aliased_name;

    public function __construct(EditableNode $aliasing_name, EditableNode $keyword, EditableNode $modifiers, EditableNode $aliased_name)
    {
        parent::__construct('trait_use_alias_item');
        $this->_aliasing_name = $aliasing_name;
        $this->_keyword = $keyword;
        $this->_modifiers = $modifiers;
        $this->_aliased_name = $aliased_name;
    }

    /**
     * @return array<string, EditableNode>
     */
    public function getChildren(): array
    {
        return ['aliasing_name' => $this->_aliasing_name, 'keyword' => $this->_keyword, 'modifiers' => $this->_modifiers, 'aliased_name' => $this->_aliased_name];
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
        $aliasing_name = $this->_aliasing_name->rewrite($rewriter, $parents);
        $keyword = $this->_keyword->rewrite($rewriter, $parents);
        $modifiers = $this->_modifiers->rewrite($rewriter, $parents);
        $aliased_name = $this->_aliased_name->rewrite($rewriter, $parents);

        if ($aliasing_name === $this->_aliasing_name && $keyword === $this->_keyword && $modifiers === $this->_modifiers && $aliased_name === $this->_aliased_name) {
            return $this;
        }

        return new static($aliasing_name, $keyword, $modifiers, $aliased_name);
    }

    public function hasAliasingName(): bool
    {
        return !$this->_aliasing_name->isMissing();
    }

    public function withAliasingName(EditableNode $value): self
    {
        if ($value === $this->_aliasing_name) {
            return $this;
        }

        return new static($value, $this->_keyword, $this->_modifiers, $this->_aliased_name);
    }

    public function getAliasingName(): EditableNode
    {
        return $this->_aliasing_name;
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

        return new static($this->_aliasing_name, $value, $this->_modifiers, $this->_aliased_name);
    }

    public function getKeyword(): EditableNode
    {
        return $this->_keyword;
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

        return new static($this->_aliasing_name, $this->_keyword, $value, $this->_aliased_name);
    }

    public function getModifiers(): EditableNode
    {
        return $this->_modifiers;
    }

    public function hasAliasedName(): bool
    {
        return !$this->_aliased_name->isMissing();
    }

    public function withAliasedName(EditableNode $value): self
    {
        if ($value === $this->_aliased_name) {
            return $this;
        }

        return new static($this->_aliasing_name, $this->_keyword, $this->_modifiers, $value);
    }

    public function getAliasedName(): EditableNode
    {
        return $this->_aliased_name;
    }
}
