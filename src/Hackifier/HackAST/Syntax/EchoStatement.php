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
final class EchoStatement extends EditableNode
{
    /**
     * @var EditableNode
     */
    private $_keyword;

    /**
     * @var EditableNode
     */
    private $_expressions;

    /**
     * @var EditableNode
     */
    private $_semicolon;

    public function __construct(EditableNode $keyword, EditableNode $expressions, EditableNode $semicolon)
    {
        parent::__construct('echo_statement');
        $this->_keyword = $keyword;
        $this->_expressions = $expressions;
        $this->_semicolon = $semicolon;
    }

    /**
     * @return array<string, EditableNode>
     */
    public function getChildren(): array
    {
        return ['keyword' => $this->_keyword, 'expressions' => $this->_expressions, 'semicolon' => $this->_semicolon];
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
        $expressions = $this->_expressions->rewrite($rewriter, $parents);
        $semicolon = $this->_semicolon->rewrite($rewriter, $parents);

        if ($keyword === $this->_keyword && $expressions === $this->_expressions && $semicolon === $this->_semicolon) {
            return $this;
        }

        return new static($keyword, $expressions, $semicolon);
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

        return new static($value, $this->_expressions, $this->_semicolon);
    }

    public function getKeyword(): EditableNode
    {
        return $this->_keyword;
    }

    public function hasExpressions(): bool
    {
        return !$this->_expressions->isMissing();
    }

    public function withExpressions(EditableNode $value): self
    {
        if ($value === $this->_expressions) {
            return $this;
        }

        return new static($this->_keyword, $value, $this->_semicolon);
    }

    public function getExpressions(): EditableNode
    {
        return $this->_expressions;
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

        return new static($this->_keyword, $this->_expressions, $value);
    }

    public function getSemicolon(): EditableNode
    {
        return $this->_semicolon;
    }
}
