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
final class BreakStatement extends EditableNode
{
    /**
     * @var EditableNode
     */
    private $_keyword;

    /**
     * @var EditableNode
     */
    private $_level;

    /**
     * @var EditableNode
     */
    private $_semicolon;

    public function __construct(EditableNode $keyword, EditableNode $level, EditableNode $semicolon)
    {
        parent::__construct('break_statement');
        $this->_keyword = $keyword;
        $this->_level = $level;
        $this->_semicolon = $semicolon;
    }

    /**
     * @return array<string, EditableNode>
     */
    public function getChildren(): array
    {
        return ['keyword' => $this->_keyword, 'level' => $this->_level, 'semicolon' => $this->_semicolon];
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
        $level = $this->_level->rewrite($rewriter, $parents);
        $semicolon = $this->_semicolon->rewrite($rewriter, $parents);

        if ($keyword === $this->_keyword && $level === $this->_level && $semicolon === $this->_semicolon) {
            return $this;
        }

        return new static($keyword, $level, $semicolon);
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

        return new static($value, $this->_level, $this->_semicolon);
    }

    public function getKeyword(): EditableNode
    {
        return $this->_keyword;
    }

    public function hasLevel(): bool
    {
        return !$this->_level->isMissing();
    }

    public function withLevel(EditableNode $value): self
    {
        if ($value === $this->_level) {
            return $this;
        }

        return new static($this->_keyword, $value, $this->_semicolon);
    }

    public function getLevel(): EditableNode
    {
        return $this->_level;
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

        return new static($this->_keyword, $this->_level, $value);
    }

    public function getSemicolon(): EditableNode
    {
        return $this->_semicolon;
    }
}
