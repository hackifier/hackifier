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
final class YieldFromExpression extends EditableNode
{
    /**
     * @var EditableNode
     */
    private $_yield_keyword;

    /**
     * @var EditableNode
     */
    private $_from_keyword;

    /**
     * @var EditableNode
     */
    private $_operand;

    public function __construct(EditableNode $yield_keyword, EditableNode $from_keyword, EditableNode $operand)
    {
        parent::__construct('yield_from_expression');
        $this->_yield_keyword = $yield_keyword;
        $this->_from_keyword = $from_keyword;
        $this->_operand = $operand;
    }

    /**
     * @return array<string, EditableNode>
     */
    public function getChildren(): array
    {
        return ['yield_keyword' => $this->_yield_keyword, 'from_keyword' => $this->_from_keyword, 'operand' => $this->_operand];
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
        $yield_keyword = $this->_yield_keyword->rewrite($rewriter, $parents);
        $from_keyword = $this->_from_keyword->rewrite($rewriter, $parents);
        $operand = $this->_operand->rewrite($rewriter, $parents);

        if ($yield_keyword === $this->_yield_keyword && $from_keyword === $this->_from_keyword && $operand === $this->_operand) {
            return $this;
        }

        return new static($yield_keyword, $from_keyword, $operand);
    }

    public function hasYieldKeyword(): bool
    {
        return !$this->_yield_keyword->isMissing();
    }

    public function withYieldKeyword(EditableNode $value): self
    {
        if ($value === $this->_yield_keyword) {
            return $this;
        }

        return new static($value, $this->_from_keyword, $this->_operand);
    }

    public function getYieldKeyword(): EditableNode
    {
        return $this->_yield_keyword;
    }

    public function hasFromKeyword(): bool
    {
        return !$this->_from_keyword->isMissing();
    }

    public function withFromKeyword(EditableNode $value): self
    {
        if ($value === $this->_from_keyword) {
            return $this;
        }

        return new static($this->_yield_keyword, $value, $this->_operand);
    }

    public function getFromKeyword(): EditableNode
    {
        return $this->_from_keyword;
    }

    public function hasOperand(): bool
    {
        return !$this->_operand->isMissing();
    }

    public function withOperand(EditableNode $value): self
    {
        if ($value === $this->_operand) {
            return $this;
        }

        return new static($this->_yield_keyword, $this->_from_keyword, $value);
    }

    public function getOperand(): EditableNode
    {
        return $this->_operand;
    }
}
