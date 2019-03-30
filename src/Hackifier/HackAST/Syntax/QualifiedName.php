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
final class QualifiedName extends EditableNode
{
    /**
     * @var EditableNode
     */
    private $_parts;

    public function __construct(EditableNode $parts)
    {
        parent::__construct('qualified_name');
        $this->_parts = $parts;
    }

    /**
     * @return array<string, EditableNode>
     */
    public function getChildren(): array
    {
        return ['parts' => $this->_parts];
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
        $parts = $this->_parts->rewrite($rewriter, $parents);

        if ($parts === $this->_parts) {
            return $this;
        }

        return new static($parts);
    }

    public function hasParts(): bool
    {
        return !$this->_parts->isMissing();
    }

    public function withParts(EditableNode $value): self
    {
        if ($value === $this->_parts) {
            return $this;
        }

        return new static($value);
    }

    public function getParts(): EditableNode
    {
        return $this->_parts;
    }
}
