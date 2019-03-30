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
final class PropertyDeclarator extends EditableNode
{
    /**
     * @var EditableNode
     */
    private $_name;

    /**
     * @var EditableNode
     */
    private $_initializer;

    public function __construct(EditableNode $name, EditableNode $initializer)
    {
        parent::__construct('property_declarator');
        $this->_name = $name;
        $this->_initializer = $initializer;
    }

    /**
     * @return array<string, EditableNode>
     */
    public function getChildren(): array
    {
        return ['name' => $this->_name, 'initializer' => $this->_initializer];
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
        $name = $this->_name->rewrite($rewriter, $parents);
        $initializer = $this->_initializer->rewrite($rewriter, $parents);

        if ($name === $this->_name && $initializer === $this->_initializer) {
            return $this;
        }

        return new static($name, $initializer);
    }

    public function hasName(): bool
    {
        return !$this->_name->isMissing();
    }

    public function withName(EditableNode $value): self
    {
        if ($value === $this->_name) {
            return $this;
        }

        return new static($value, $this->_initializer);
    }

    public function getName(): EditableNode
    {
        return $this->_name;
    }

    public function hasInitializer(): bool
    {
        return !$this->_initializer->isMissing();
    }

    public function withInitializer(EditableNode $value): self
    {
        if ($value === $this->_initializer) {
            return $this;
        }

        return new static($this->_name, $value);
    }

    public function getInitializer(): EditableNode
    {
        return $this->_initializer;
    }
}
