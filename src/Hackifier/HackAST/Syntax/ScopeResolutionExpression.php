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
final class ScopeResolutionExpression extends EditableNode
{
    /**
     * @var EditableNode
     */
    private $_qualifier;

    /**
     * @var EditableNode
     */
    private $_operator;

    /**
     * @var EditableNode
     */
    private $_name;

    public function __construct(EditableNode $qualifier, EditableNode $operator, EditableNode $name)
    {
        parent::__construct('scope_resolution_expression');
        $this->_qualifier = $qualifier;
        $this->_operator = $operator;
        $this->_name = $name;
    }

    /**
     * @return array<string, EditableNode>
     */
    public function getChildren(): array
    {
        return ['qualifier' => $this->_qualifier, 'operator' => $this->_operator, 'name' => $this->_name];
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
        $qualifier = $this->_qualifier->rewrite($rewriter, $parents);
        $operator = $this->_operator->rewrite($rewriter, $parents);
        $name = $this->_name->rewrite($rewriter, $parents);

        if ($qualifier === $this->_qualifier && $operator === $this->_operator && $name === $this->_name) {
            return $this;
        }

        return new static($qualifier, $operator, $name);
    }

    public function hasQualifier(): bool
    {
        return !$this->_qualifier->isMissing();
    }

    public function withQualifier(EditableNode $value): self
    {
        if ($value === $this->_qualifier) {
            return $this;
        }

        return new static($value, $this->_operator, $this->_name);
    }

    public function getQualifier(): EditableNode
    {
        return $this->_qualifier;
    }

    public function hasOperator(): bool
    {
        return !$this->_operator->isMissing();
    }

    public function withOperator(EditableNode $value): self
    {
        if ($value === $this->_operator) {
            return $this;
        }

        return new static($this->_qualifier, $value, $this->_name);
    }

    public function getOperator(): EditableNode
    {
        return $this->_operator;
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

        return new static($this->_qualifier, $this->_operator, $value);
    }

    public function getName(): EditableNode
    {
        return $this->_name;
    }
}
