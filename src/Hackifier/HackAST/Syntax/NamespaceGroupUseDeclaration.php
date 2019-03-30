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
final class NamespaceGroupUseDeclaration extends EditableNode implements INamespaceUseDeclaration
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
    private $_prefix;

    /**
     * @var EditableNode
     */
    private $_left_brace;

    /**
     * @var EditableNode
     */
    private $_clauses;

    /**
     * @var EditableNode
     */
    private $_right_brace;

    /**
     * @var EditableNode
     */
    private $_semicolon;

    public function __construct(EditableNode $keyword, EditableNode $kind, EditableNode $prefix, EditableNode $left_brace, EditableNode $clauses, EditableNode $right_brace, EditableNode $semicolon)
    {
        parent::__construct('namespace_group_use_declaration');
        $this->_keyword = $keyword;
        $this->_kind = $kind;
        $this->_prefix = $prefix;
        $this->_left_brace = $left_brace;
        $this->_clauses = $clauses;
        $this->_right_brace = $right_brace;
        $this->_semicolon = $semicolon;
    }

    /**
     * @return array<string, EditableNode>
     */
    public function getChildren(): array
    {
        return ['keyword' => $this->_keyword, 'kind' => $this->_kind, 'prefix' => $this->_prefix, 'left_brace' => $this->_left_brace, 'clauses' => $this->_clauses, 'right_brace' => $this->_right_brace, 'semicolon' => $this->_semicolon];
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
        $prefix = $this->_prefix->rewrite($rewriter, $parents);
        $left_brace = $this->_left_brace->rewrite($rewriter, $parents);
        $clauses = $this->_clauses->rewrite($rewriter, $parents);
        $right_brace = $this->_right_brace->rewrite($rewriter, $parents);
        $semicolon = $this->_semicolon->rewrite($rewriter, $parents);

        if ($keyword === $this->_keyword && $kind === $this->_kind && $prefix === $this->_prefix && $left_brace === $this->_left_brace && $clauses === $this->_clauses && $right_brace === $this->_right_brace && $semicolon === $this->_semicolon) {
            return $this;
        }

        return new static($keyword, $kind, $prefix, $left_brace, $clauses, $right_brace, $semicolon);
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

        return new static($value, $this->_kind, $this->_prefix, $this->_left_brace, $this->_clauses, $this->_right_brace, $this->_semicolon);
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

        return new static($this->_keyword, $value, $this->_prefix, $this->_left_brace, $this->_clauses, $this->_right_brace, $this->_semicolon);
    }

    public function getKind(): EditableNode
    {
        return $this->_kind;
    }

    public function hasPrefix(): bool
    {
        return !$this->_prefix->isMissing();
    }

    public function withPrefix(EditableNode $value): self
    {
        if ($value === $this->_prefix) {
            return $this;
        }

        return new static($this->_keyword, $this->_kind, $value, $this->_left_brace, $this->_clauses, $this->_right_brace, $this->_semicolon);
    }

    public function getPrefix(): EditableNode
    {
        return $this->_prefix;
    }

    public function hasLeftBrace(): bool
    {
        return !$this->_left_brace->isMissing();
    }

    public function withLeftBrace(EditableNode $value): self
    {
        if ($value === $this->_left_brace) {
            return $this;
        }

        return new static($this->_keyword, $this->_kind, $this->_prefix, $value, $this->_clauses, $this->_right_brace, $this->_semicolon);
    }

    public function getLeftBrace(): EditableNode
    {
        return $this->_left_brace;
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

        return new static($this->_keyword, $this->_kind, $this->_prefix, $this->_left_brace, $value, $this->_right_brace, $this->_semicolon);
    }

    public function getClauses(): EditableNode
    {
        return $this->_clauses;
    }

    public function hasRightBrace(): bool
    {
        return !$this->_right_brace->isMissing();
    }

    public function withRightBrace(EditableNode $value): self
    {
        if ($value === $this->_right_brace) {
            return $this;
        }

        return new static($this->_keyword, $this->_kind, $this->_prefix, $this->_left_brace, $this->_clauses, $value, $this->_semicolon);
    }

    public function getRightBrace(): EditableNode
    {
        return $this->_right_brace;
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

        return new static($this->_keyword, $this->_kind, $this->_prefix, $this->_left_brace, $this->_clauses, $this->_right_brace, $value);
    }

    public function getSemicolon(): EditableNode
    {
        return $this->_semicolon;
    }
}
