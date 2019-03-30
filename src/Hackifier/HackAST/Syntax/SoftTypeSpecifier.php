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
final class SoftTypeSpecifier extends EditableNode
{
    /**
     * @var EditableNode
     */
    private $_at;

    /**
     * @var EditableNode
     */
    private $_type;

    public function __construct(EditableNode $at, EditableNode $type)
    {
        parent::__construct('soft_type_specifier');
        $this->_at = $at;
        $this->_type = $type;
    }

    /**
     * @return array<string, EditableNode>
     */
    public function getChildren(): array
    {
        return ['at' => $this->_at, 'type' => $this->_type];
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
        $type = $this->_type->rewrite($rewriter, $parents);

        if ($at === $this->_at && $type === $this->_type) {
            return $this;
        }

        return new static($at, $type);
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

        return new static($value, $this->_type);
    }

    public function getAt(): EditableNode
    {
        return $this->_at;
    }

    public function hasType(): bool
    {
        return !$this->_type->isMissing();
    }

    public function withType(EditableNode $value): self
    {
        if ($value === $this->_type) {
            return $this;
        }

        return new static($this->_at, $value);
    }

    public function getType(): EditableNode
    {
        return $this->_type;
    }
}
