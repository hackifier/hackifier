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
final class GotoLabel extends EditableNode
{
    /**
     * @var EditableNode
     */
    private $_name;

    /**
     * @var EditableNode
     */
    private $_colon;

    public function __construct(EditableNode $name, EditableNode $colon)
    {
        parent::__construct('goto_label');
        $this->_name = $name;
        $this->_colon = $colon;
    }

    /**
     * @return array<string, EditableNode>
     */
    public function getChildren(): array
    {
        return ['name' => $this->_name, 'colon' => $this->_colon];
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
        $colon = $this->_colon->rewrite($rewriter, $parents);

        if ($name === $this->_name && $colon === $this->_colon) {
            return $this;
        }

        return new static($name, $colon);
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

        return new static($value, $this->_colon);
    }

    public function getName(): EditableNode
    {
        return $this->_name;
    }

    public function hasColon(): bool
    {
        return !$this->_colon->isMissing();
    }

    public function withColon(EditableNode $value): self
    {
        if ($value === $this->_colon) {
            return $this;
        }

        return new static($this->_name, $value);
    }

    public function getColon(): EditableNode
    {
        return $this->_colon;
    }
}
