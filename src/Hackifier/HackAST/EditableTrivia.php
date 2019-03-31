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

namespace Hackifier\HackAST;

abstract class EditableTrivia extends EditableNode
{
    /**
     * @var string
     */
    private $_text;

    public function __construct(string $trivia_kind, string $text)
    {
        parent::__construct($trivia_kind);
        $this->_text = $text;
    }

    public function getText(): string
    {
        return $this->_text;
    }

    public function getCode(): string
    {
        return $this->_text;
    }

    public function getWidth(): int
    {
        return \strlen($this->_text);
    }

    final public function isTrivia(): bool
    {
        return true;
    }

    /**
     * @return array<string, EditableNode>
     */
    public function getChildren(): array
    {
        return [];
    }

    /**
     * @param mixed                         $_rewriter
     * @param array<int, EditableNode>|null $_parents
     *
     * @return static
     */
    final public function rewriteDescendants($_rewriter, ?array $_parents = null)
    {
        // Trivia have no children
        return $this;
    }
}
