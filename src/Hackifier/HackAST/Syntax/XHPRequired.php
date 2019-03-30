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
final class XHPRequired extends EditableNode
{
    /**
     * @var EditableNode
     */
    private $_at;

    /**
     * @var EditableNode
     */
    private $_keyword;

    public function __construct(EditableNode $at, EditableNode $keyword)
    {
        parent::__construct('xhp_required');
        $this->_at = $at;
        $this->_keyword = $keyword;
    }

    /**
     * @return array<string, EditableNode>
     */
    public function getChildren(): array
    {
        return ['at' => $this->_at, 'keyword' => $this->_keyword];
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
        $at = $this->_at->rewrite($rewriter, $parents);
        $keyword = $this->_keyword->rewrite($rewriter, $parents);

        if ($at === $this->_at && $keyword === $this->_keyword) {
            return $this;
        }

        return new static($at, $keyword);
    }

    public function hasAt(): bool
    {
        return !$this->_at->isMissing();
    }

    public function withAt(EditableNode $value): self
    {
        if ($value === $this->_at) {
            return $this;
        }

        return new static($value, $this->_keyword);
    }

    public function getAt(): EditableNode
    {
        return $this->_at;
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

        return new static($this->_at, $value);
    }

    public function getKeyword(): EditableNode
    {
        return $this->_keyword;
    }
}
