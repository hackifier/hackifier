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
final class XHPSimpleAttribute extends EditableNode
{
    /**
     * @var EditableNode
     */
    private $_name;

    /**
     * @var EditableNode
     */
    private $_equal;

    /**
     * @var EditableNode
     */
    private $_expression;

    public function __construct(EditableNode $name, EditableNode $equal, EditableNode $expression)
    {
        parent::__construct('xhp_simple_attribute');
        $this->_name = $name;
        $this->_equal = $equal;
        $this->_expression = $expression;
    }

    /**
     * @return array<string, EditableNode>
     */
    public function getChildren(): array
    {
        return ['name' => $this->_name, 'equal' => $this->_equal, 'expression' => $this->_expression];
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
        $equal = $this->_equal->rewrite($rewriter, $parents);
        $expression = $this->_expression->rewrite($rewriter, $parents);

        if ($name === $this->_name && $equal === $this->_equal && $expression === $this->_expression) {
            return $this;
        }

        return new static($name, $equal, $expression);
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

        return new static($value, $this->_equal, $this->_expression);
    }

    public function getName(): EditableNode
    {
        return $this->_name;
    }

    public function hasEqual(): bool
    {
        return !$this->_equal->isMissing();
    }

    public function withEqual(EditableNode $value): self
    {
        if ($value === $this->_equal) {
            return $this;
        }

        return new static($this->_name, $value, $this->_expression);
    }

    public function getEqual(): EditableNode
    {
        return $this->_equal;
    }

    public function hasExpression(): bool
    {
        return !$this->_expression->isMissing();
    }

    public function withExpression(EditableNode $value): self
    {
        if ($value === $this->_expression) {
            return $this;
        }

        return new static($this->_name, $this->_equal, $value);
    }

    public function getExpression(): EditableNode
    {
        return $this->_expression;
    }
}
