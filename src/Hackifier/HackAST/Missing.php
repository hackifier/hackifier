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

final class Missing extends EditableNode
{
    public function __construct()
    {
        parent::__construct('missing');
    }

    public function isMissing(): bool
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

    public static function getInstance(): Missing
    {
        return new self();
    }

    /**
     * @param mixed                         $_rewriter
     * @param array<int, EditableNode>|null $_parents
     *
     * @return static
     */
    public function rewriteDescendants($_rewriter, ?array $_parents = null)
    {
        return $this;
    }
}

function Missing(): Missing
{
    return Missing::getInstance();
}
