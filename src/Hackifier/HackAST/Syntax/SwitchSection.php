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
final class SwitchSection extends EditableNode
{
    /**
     * @var EditableNode
     */
    private $_labels;

    /**
     * @var EditableNode
     */
    private $_statements;

    /**
     * @var EditableNode
     */
    private $_fallthrough;

    public function __construct(EditableNode $labels, EditableNode $statements, EditableNode $fallthrough)
    {
        parent::__construct('switch_section');
        $this->_labels = $labels;
        $this->_statements = $statements;
        $this->_fallthrough = $fallthrough;
    }

    /**
     * @return array<string, EditableNode>
     */
    public function getChildren(): array
    {
        return ['labels' => $this->_labels, 'statements' => $this->_statements, 'fallthrough' => $this->_fallthrough];
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
        $labels = $this->_labels->rewrite($rewriter, $parents);
        $statements = $this->_statements->rewrite($rewriter, $parents);
        $fallthrough = $this->_fallthrough->rewrite($rewriter, $parents);

        if ($labels === $this->_labels && $statements === $this->_statements && $fallthrough === $this->_fallthrough) {
            return $this;
        }

        return new static($labels, $statements, $fallthrough);
    }

    public function hasLabels(): bool
    {
        return !$this->_labels->isMissing();
    }

    public function withLabels(EditableNode $value): self
    {
        if ($value === $this->_labels) {
            return $this;
        }

        return new static($value, $this->_statements, $this->_fallthrough);
    }

    public function getLabels(): EditableNode
    {
        return $this->_labels;
    }

    public function hasStatements(): bool
    {
        return !$this->_statements->isMissing();
    }

    public function withStatements(EditableNode $value): self
    {
        if ($value === $this->_statements) {
            return $this;
        }

        return new static($this->_labels, $value, $this->_fallthrough);
    }

    public function getStatements(): EditableNode
    {
        return $this->_statements;
    }

    public function hasFallthrough(): bool
    {
        return !$this->_fallthrough->isMissing();
    }

    public function withFallthrough(EditableNode $value): self
    {
        if ($value === $this->_fallthrough) {
            return $this;
        }

        return new static($this->_labels, $this->_statements, $value);
    }

    public function getFallthrough(): EditableNode
    {
        return $this->_fallthrough;
    }
}
