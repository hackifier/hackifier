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
final class TraitUsePrecedenceItem extends EditableNode
{
    /**
     * @var EditableNode
     */
    private $_name;

    /**
     * @var EditableNode
     */
    private $_keyword;

    /**
     * @var EditableNode
     */
    private $_removed_names;

    public function __construct(EditableNode $name, EditableNode $keyword, EditableNode $removed_names)
    {
        parent::__construct('trait_use_precedence_item');
        $this->_name = $name;
        $this->_keyword = $keyword;
        $this->_removed_names = $removed_names;
    }

    /**
     * @return array<string, EditableNode>
     */
    public function getChildren(): array
    {
        return ['name' => $this->_name, 'keyword' => $this->_keyword, 'removed_names' => $this->_removed_names];
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
        $name = $this->_name->rewrite($rewriter, $parents);
        $keyword = $this->_keyword->rewrite($rewriter, $parents);
        $removed_names = $this->_removed_names->rewrite($rewriter, $parents);

        if ($name === $this->_name && $keyword === $this->_keyword && $removed_names === $this->_removed_names) {
            return $this;
        }

        return new static($name, $keyword, $removed_names);
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

        return new static($value, $this->_keyword, $this->_removed_names);
    }

    public function getName(): EditableNode
    {
        return $this->_name;
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

        return new static($this->_name, $value, $this->_removed_names);
    }

    public function getKeyword(): EditableNode
    {
        return $this->_keyword;
    }

    public function hasRemovedNames(): bool
    {
        return !$this->_removed_names->isMissing();
    }

    public function withRemovedNames(EditableNode $value): self
    {
        if ($value === $this->_removed_names) {
            return $this;
        }

        return new static($this->_name, $this->_keyword, $value);
    }

    public function getRemovedNames(): EditableNode
    {
        return $this->_removed_names;
    }
}
