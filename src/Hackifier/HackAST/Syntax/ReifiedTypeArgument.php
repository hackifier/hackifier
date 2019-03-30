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
final class ReifiedTypeArgument extends EditableNode
{
    /**
     * @var EditableNode
     */
    private $_reified;

    /**
     * @var EditableNode
     */
    private $_type;

    public function __construct(EditableNode $reified, EditableNode $type)
    {
        parent::__construct('reified_type_argument');
        $this->_reified = $reified;
        $this->_type = $type;
    }

    /**
     * @return array<string, EditableNode>
     */
    public function getChildren(): array
    {
        return ['reified' => $this->_reified, 'type' => $this->_type];
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
        $reified = $this->_reified->rewrite($rewriter, $parents);
        $type = $this->_type->rewrite($rewriter, $parents);

        if ($reified === $this->_reified && $type === $this->_type) {
            return $this;
        }

        return new static($reified, $type);
    }

    public function hasReified(): bool
    {
        return !$this->_reified->isMissing();
    }

    public function withReified(EditableNode $value): self
    {
        if ($value === $this->_reified) {
            return $this;
        }

        return new static($value, $this->_type);
    }

    public function getReified(): EditableNode
    {
        return $this->_reified;
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

        return new static($this->_reified, $value);
    }

    public function getType(): EditableNode
    {
        return $this->_type;
    }
}
