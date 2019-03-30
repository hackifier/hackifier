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
final class NamespaceUseClause extends EditableNode
{
    /**
     * @var EditableNode
     */
    private $_clause_kind;

    /**
     * @var EditableNode
     */
    private $_name;

    /**
     * @var EditableNode
     */
    private $_as;

    /**
     * @var EditableNode
     */
    private $_alias;

    public function __construct(EditableNode $clause_kind, EditableNode $name, EditableNode $as, EditableNode $alias)
    {
        parent::__construct('namespace_use_clause');
        $this->_clause_kind = $clause_kind;
        $this->_name = $name;
        $this->_as = $as;
        $this->_alias = $alias;
    }

    /**
     * @return array<string, EditableNode>
     */
    public function getChildren(): array
    {
        return ['clause_kind' => $this->_clause_kind, 'name' => $this->_name, 'as' => $this->_as, 'alias' => $this->_alias];
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
        $clause_kind = $this->_clause_kind->rewrite($rewriter, $parents);
        $name = $this->_name->rewrite($rewriter, $parents);
        $as = $this->_as->rewrite($rewriter, $parents);
        $alias = $this->_alias->rewrite($rewriter, $parents);

        if ($clause_kind === $this->_clause_kind && $name === $this->_name && $as === $this->_as && $alias === $this->_alias) {
            return $this;
        }

        return new static($clause_kind, $name, $as, $alias);
    }

    public function hasClauseKind(): bool
    {
        return !$this->_clause_kind->isMissing();
    }

    public function withClauseKind(EditableNode $value): self
    {
        if ($value === $this->_clause_kind) {
            return $this;
        }

        return new static($value, $this->_name, $this->_as, $this->_alias);
    }

    public function getClauseKind(): EditableNode
    {
        return $this->_clause_kind;
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

        return new static($this->_clause_kind, $value, $this->_as, $this->_alias);
    }

    public function getName(): EditableNode
    {
        return $this->_name;
    }

    public function hasAs(): bool
    {
        return !$this->_as->isMissing();
    }

    public function withAs(EditableNode $value): self
    {
        if ($value === $this->_as) {
            return $this;
        }

        return new static($this->_clause_kind, $this->_name, $value, $this->_alias);
    }

    public function getAs(): EditableNode
    {
        return $this->_as;
    }

    public function hasAlias(): bool
    {
        return !$this->_alias->isMissing();
    }

    public function withAlias(EditableNode $value): self
    {
        if ($value === $this->_alias) {
            return $this;
        }

        return new static($this->_clause_kind, $this->_name, $this->_as, $value);
    }

    public function getAlias(): EditableNode
    {
        return $this->_alias;
    }
}
