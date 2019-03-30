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
final class DecoratedExpression extends EditableNode
{
    /**
     * @var EditableNode
     */
    private $_decorator;

    /**
     * @var EditableNode
     */
    private $_expression;

    public function __construct(EditableNode $decorator, EditableNode $expression)
    {
        parent::__construct('decorated_expression');
        $this->_decorator = $decorator;
        $this->_expression = $expression;
    }

    /**
     * @return array<string, EditableNode>
     */
    public function getChildren(): array
    {
        return ['decorator' => $this->_decorator, 'expression' => $this->_expression];
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
        $decorator = $this->_decorator->rewrite($rewriter, $parents);
        $expression = $this->_expression->rewrite($rewriter, $parents);

        if ($decorator === $this->_decorator && $expression === $this->_expression) {
            return $this;
        }

        return new static($decorator, $expression);
    }

    public function hasDecorator(): bool
    {
        return !$this->_decorator->isMissing();
    }

    public function withDecorator(EditableNode $value): self
    {
        if ($value === $this->_decorator) {
            return $this;
        }

        return new static($value, $this->_expression);
    }

    public function getDecorator(): EditableNode
    {
        return $this->_decorator;
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

        return new static($this->_decorator, $value);
    }

    public function getExpression(): EditableNode
    {
        return $this->_expression;
    }
}
