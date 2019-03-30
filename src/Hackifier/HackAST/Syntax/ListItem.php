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
final class ListItem extends EditableNode
{
    /**
     * @var EditableNode
     */
    private $_item;

    /**
     * @var EditableNode
     */
    private $_separator;

    public function __construct(EditableNode $item, EditableNode $separator)
    {
        parent::__construct('list_item');
        $this->_item = $item;
        $this->_separator = $separator;
    }

    /**
     * @return array<string, EditableNode>
     */
    public function getChildren(): array
    {
        return ['item' => $this->_item, 'separator' => $this->_separator];
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
        $item = $this->_item->rewrite($rewriter, $parents);
        $separator = $this->_separator->rewrite($rewriter, $parents);

        if ($item === $this->_item && $separator === $this->_separator) {
            return $this;
        }

        return new static($item, $separator);
    }

    public function hasItem(): bool
    {
        return !$this->_item->isMissing();
    }

    public function withItem(EditableNode $value): self
    {
        if ($value === $this->_item) {
            return $this;
        }

        return new static($value, $this->_separator);
    }

    public function getItem(): EditableNode
    {
        return $this->_item;
    }

    public function hasSeparator(): bool
    {
        return !$this->_separator->isMissing();
    }

    public function withSeparator(EditableNode $value): self
    {
        if ($value === $this->_separator) {
            return $this;
        }

        return new static($this->_item, $value);
    }

    public function getSeparator(): EditableNode
    {
        return $this->_separator;
    }
}
