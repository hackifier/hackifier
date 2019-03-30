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
final class AwaitableCreationExpression extends EditableNode
{
    /**
     * @var EditableNode
     */
    private $_attribute_spec;

    /**
     * @var EditableNode
     */
    private $_async;

    /**
     * @var EditableNode
     */
    private $_coroutine;

    /**
     * @var EditableNode
     */
    private $_compound_statement;

    public function __construct(EditableNode $attribute_spec, EditableNode $async, EditableNode $coroutine, EditableNode $compound_statement)
    {
        parent::__construct('awaitable_creation_expression');
        $this->_attribute_spec = $attribute_spec;
        $this->_async = $async;
        $this->_coroutine = $coroutine;
        $this->_compound_statement = $compound_statement;
    }

    /**
     * @return array<string, EditableNode>
     */
    public function getChildren(): array
    {
        return ['attribute_spec' => $this->_attribute_spec, 'async' => $this->_async, 'coroutine' => $this->_coroutine, 'compound_statement' => $this->_compound_statement];
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
        $attribute_spec = $this->_attribute_spec->rewrite($rewriter, $parents);
        $async = $this->_async->rewrite($rewriter, $parents);
        $coroutine = $this->_coroutine->rewrite($rewriter, $parents);
        $compound_statement = $this->_compound_statement->rewrite($rewriter, $parents);

        if ($attribute_spec === $this->_attribute_spec && $async === $this->_async && $coroutine === $this->_coroutine && $compound_statement === $this->_compound_statement) {
            return $this;
        }

        return new static($attribute_spec, $async, $coroutine, $compound_statement);
    }

    public function hasAttributeSpec(): bool
    {
        return !$this->_attribute_spec->isMissing();
    }

    public function withAttributeSpec(EditableNode $value): self
    {
        if ($value === $this->_attribute_spec) {
            return $this;
        }

        return new static($value, $this->_async, $this->_coroutine, $this->_compound_statement);
    }

    public function getAttributeSpec(): EditableNode
    {
        return $this->_attribute_spec;
    }

    public function hasAsync(): bool
    {
        return !$this->_async->isMissing();
    }

    public function withAsync(EditableNode $value): self
    {
        if ($value === $this->_async) {
            return $this;
        }

        return new static($this->_attribute_spec, $value, $this->_coroutine, $this->_compound_statement);
    }

    public function getAsync(): EditableNode
    {
        return $this->_async;
    }

    public function hasCoroutine(): bool
    {
        return !$this->_coroutine->isMissing();
    }

    public function withCoroutine(EditableNode $value): self
    {
        if ($value === $this->_coroutine) {
            return $this;
        }

        return new static($this->_attribute_spec, $this->_async, $value, $this->_compound_statement);
    }

    public function getCoroutine(): EditableNode
    {
        return $this->_coroutine;
    }

    public function hasCompoundStatement(): bool
    {
        return !$this->_compound_statement->isMissing();
    }

    public function withCompoundStatement(EditableNode $value): self
    {
        if ($value === $this->_compound_statement) {
            return $this;
        }

        return new static($this->_attribute_spec, $this->_async, $this->_coroutine, $value);
    }

    public function getCompoundStatement(): EditableNode
    {
        return $this->_compound_statement;
    }
}
