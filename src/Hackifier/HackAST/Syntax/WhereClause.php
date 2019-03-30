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
final class WhereClause extends EditableNode
{
    /**
     * @var EditableNode
     */
    private $_keyword;

    /**
     * @var EditableNode
     */
    private $_constraints;

    public function __construct(EditableNode $keyword, EditableNode $constraints)
    {
        parent::__construct('where_clause');
        $this->_keyword = $keyword;
        $this->_constraints = $constraints;
    }

    /**
     * @return array<string, EditableNode>
     */
    public function getChildren(): array
    {
        return ['keyword' => $this->_keyword, 'constraints' => $this->_constraints];
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
        $keyword = $this->_keyword->rewrite($rewriter, $parents);
        $constraints = $this->_constraints->rewrite($rewriter, $parents);

        if ($keyword === $this->_keyword && $constraints === $this->_constraints) {
            return $this;
        }

        return new static($keyword, $constraints);
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

        return new static($value, $this->_constraints);
    }

    public function getKeyword(): EditableNode
    {
        return $this->_keyword;
    }

    public function hasConstraints(): bool
    {
        return !$this->_constraints->isMissing();
    }

    public function withConstraints(EditableNode $value): self
    {
        if ($value === $this->_constraints) {
            return $this;
        }

        return new static($this->_keyword, $value);
    }

    public function getConstraints(): EditableNode
    {
        return $this->_constraints;
    }
}
