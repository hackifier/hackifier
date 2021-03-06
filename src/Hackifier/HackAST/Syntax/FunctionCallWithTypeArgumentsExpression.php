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
final class FunctionCallWithTypeArgumentsExpression extends EditableNode
{
    /**
     * @var EditableNode
     */
    private $_receiver;

    /**
     * @var EditableNode
     */
    private $_type_args;

    /**
     * @var EditableNode
     */
    private $_left_paren;

    /**
     * @var EditableNode
     */
    private $_argument_list;

    /**
     * @var EditableNode
     */
    private $_right_paren;

    public function __construct(EditableNode $receiver, EditableNode $type_args, EditableNode $left_paren, EditableNode $argument_list, EditableNode $right_paren)
    {
        parent::__construct('function_call_with_type_arguments_expression');
        $this->_receiver = $receiver;
        $this->_type_args = $type_args;
        $this->_left_paren = $left_paren;
        $this->_argument_list = $argument_list;
        $this->_right_paren = $right_paren;
    }

    /**
     * @return array<string, EditableNode>
     */
    public function getChildren(): array
    {
        return ['receiver' => $this->_receiver, 'type_args' => $this->_type_args, 'left_paren' => $this->_left_paren, 'argument_list' => $this->_argument_list, 'right_paren' => $this->_right_paren];
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
        $receiver = $this->_receiver->rewrite($rewriter, $parents);
        $type_args = $this->_type_args->rewrite($rewriter, $parents);
        $left_paren = $this->_left_paren->rewrite($rewriter, $parents);
        $argument_list = $this->_argument_list->rewrite($rewriter, $parents);
        $right_paren = $this->_right_paren->rewrite($rewriter, $parents);

        if ($receiver === $this->_receiver && $type_args === $this->_type_args && $left_paren === $this->_left_paren && $argument_list === $this->_argument_list && $right_paren === $this->_right_paren) {
            return $this;
        }

        return new static($receiver, $type_args, $left_paren, $argument_list, $right_paren);
    }

    public function hasReceiver(): bool
    {
        return !$this->_receiver->isMissing();
    }

    public function withReceiver(EditableNode $value): self
    {
        if ($value === $this->_receiver) {
            return $this;
        }

        return new static($value, $this->_type_args, $this->_left_paren, $this->_argument_list, $this->_right_paren);
    }

    public function getReceiver(): EditableNode
    {
        return $this->_receiver;
    }

    public function hasTypeArgs(): bool
    {
        return !$this->_type_args->isMissing();
    }

    public function withTypeArgs(EditableNode $value): self
    {
        if ($value === $this->_type_args) {
            return $this;
        }

        return new static($this->_receiver, $value, $this->_left_paren, $this->_argument_list, $this->_right_paren);
    }

    public function getTypeArgs(): EditableNode
    {
        return $this->_type_args;
    }

    public function hasLeftParen(): bool
    {
        return !$this->_left_paren->isMissing();
    }

    public function withLeftParen(EditableNode $value): self
    {
        if ($value === $this->_left_paren) {
            return $this;
        }

        return new static($this->_receiver, $this->_type_args, $value, $this->_argument_list, $this->_right_paren);
    }

    public function getLeftParen(): EditableNode
    {
        return $this->_left_paren;
    }

    public function hasArgumentList(): bool
    {
        return !$this->_argument_list->isMissing();
    }

    public function withArgumentList(EditableNode $value): self
    {
        if ($value === $this->_argument_list) {
            return $this;
        }

        return new static($this->_receiver, $this->_type_args, $this->_left_paren, $value, $this->_right_paren);
    }

    public function getArgumentList(): EditableNode
    {
        return $this->_argument_list;
    }

    public function hasRightParen(): bool
    {
        return !$this->_right_paren->isMissing();
    }

    public function withRightParen(EditableNode $value): self
    {
        if ($value === $this->_right_paren) {
            return $this;
        }

        return new static($this->_receiver, $this->_type_args, $this->_left_paren, $this->_argument_list, $value);
    }

    public function getRightParen(): EditableNode
    {
        return $this->_right_paren;
    }
}
