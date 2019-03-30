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
use Hackifier\HackAST\INamespaceUseDeclaration;

/**
 * This class is generated. Do not modify it manually!
 *
 * @version 2018-11-27-0001
 */
final class NamespaceUseDeclaration extends EditableNode implements INamespaceUseDeclaration
{
    /**
     * @var EditableNode
     */
    private $_keyword;

    /**
     * @var EditableNode
     */
    private $_kind;

    /**
     * @var EditableNode
     */
    private $_clauses;

    /**
     * @var EditableNode
     */
    private $_semicolon;

    public function __construct(EditableNode $keyword, EditableNode $kind, EditableNode $clauses, EditableNode $semicolon)
    {
        parent::__construct('namespace_use_declaration');
        $this->_keyword = $keyword;
        $this->_kind = $kind;
        $this->_clauses = $clauses;
        $this->_semicolon = $semicolon;
    }

    /**
     * @return array<string, EditableNode>
     */
    public function getChildren(): array
    {
        return ['keyword' => $this->_keyword, 'kind' => $this->_kind, 'clauses' => $this->_clauses, 'semicolon' => $this->_semicolon];
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
        $kind = $this->_kind->rewrite($rewriter, $parents);
        $clauses = $this->_clauses->rewrite($rewriter, $parents);
        $semicolon = $this->_semicolon->rewrite($rewriter, $parents);

        if ($keyword === $this->_keyword && $kind === $this->_kind && $clauses === $this->_clauses && $semicolon === $this->_semicolon) {
            return $this;
        }

        return new static($keyword, $kind, $clauses, $semicolon);
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

        return new static($value, $this->_kind, $this->_clauses, $this->_semicolon);
    }

    public function getKeyword(): EditableNode
    {
        return $this->_keyword;
    }

    public function hasKind(): bool
    {
        return !$this->_kind->isMissing();
    }

    public function withKind(EditableNode $value): self
    {
        if ($value === $this->_kind) {
            return $this;
        }

        return new static($this->_keyword, $value, $this->_clauses, $this->_semicolon);
    }

    public function getKind(): EditableNode
    {
        return $this->_kind;
    }

    public function hasClauses(): bool
    {
        return !$this->_clauses->isMissing();
    }

    public function withClauses(EditableNode $value): self
    {
        if ($value === $this->_clauses) {
            return $this;
        }

        return new static($this->_keyword, $this->_kind, $value, $this->_semicolon);
    }

    public function getClauses(): EditableNode
    {
        return $this->_clauses;
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

        return new static($this->_keyword, $this->_kind, $this->_clauses, $value);
    }

    public function getSemicolon(): EditableNode
    {
        return $this->_semicolon;
    }
}
