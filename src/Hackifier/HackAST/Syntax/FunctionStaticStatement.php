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
final class FunctionStaticStatement extends EditableNode
{
    /**
     * @var EditableNode
     */
    private $_static_keyword;

    /**
     * @var EditableNode
     */
    private $_declarations;

    /**
     * @var EditableNode
     */
    private $_semicolon;

    public function __construct(EditableNode $static_keyword, EditableNode $declarations, EditableNode $semicolon)
    {
        parent::__construct('function_static_statement');
        $this->_static_keyword = $static_keyword;
        $this->_declarations = $declarations;
        $this->_semicolon = $semicolon;
    }

    /**
     * @return array<string, EditableNode>
     */
    public function getChildren(): array
    {
        return ['static_keyword' => $this->_static_keyword, 'declarations' => $this->_declarations, 'semicolon' => $this->_semicolon];
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
        $static_keyword = $this->_static_keyword->rewrite($rewriter, $parents);
        $declarations = $this->_declarations->rewrite($rewriter, $parents);
        $semicolon = $this->_semicolon->rewrite($rewriter, $parents);

        if ($static_keyword === $this->_static_keyword && $declarations === $this->_declarations && $semicolon === $this->_semicolon) {
            return $this;
        }

        return new static($static_keyword, $declarations, $semicolon);
    }

    public function hasStaticKeyword(): bool
    {
        return !$this->_static_keyword->isMissing();
    }

    public function withStaticKeyword(EditableNode $value): self
    {
        if ($value === $this->_static_keyword) {
            return $this;
        }

        return new static($value, $this->_declarations, $this->_semicolon);
    }

    public function getStaticKeyword(): EditableNode
    {
        return $this->_static_keyword;
    }

    public function hasDeclarations(): bool
    {
        return !$this->_declarations->isMissing();
    }

    public function withDeclarations(EditableNode $value): self
    {
        if ($value === $this->_declarations) {
            return $this;
        }

        return new static($this->_static_keyword, $value, $this->_semicolon);
    }

    public function getDeclarations(): EditableNode
    {
        return $this->_declarations;
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

        return new static($this->_static_keyword, $this->_declarations, $value);
    }

    public function getSemicolon(): EditableNode
    {
        return $this->_semicolon;
    }
}
