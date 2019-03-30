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
final class VariableExpression extends EditableNode
{
    /**
     * @var EditableNode
     */
    private $_expression;

    public function __construct(EditableNode $expression)
    {
        parent::__construct('variable_expression');
        $this->_expression = $expression;
    }

    /**
     * @return array<string, EditableNode>
     */
    public function getChildren(): array
    {
        return ['expression' => $this->_expression];
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
        $expression = $this->_expression->rewrite($rewriter, $parents);

        if ($expression === $this->_expression) {
            return $this;
        }

        return new static($expression);
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

        return new static($value);
    }

    public function getExpression(): EditableNode
    {
        return $this->_expression;
    }
}
