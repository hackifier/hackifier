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
final class ClosureTypeSpecifier extends EditableNode
{
    /**
     * @var EditableNode
     */
    private $_outer_left_paren;

    /**
     * @var EditableNode
     */
    private $_coroutine;

    /**
     * @var EditableNode
     */
    private $_function_keyword;

    /**
     * @var EditableNode
     */
    private $_inner_left_paren;

    /**
     * @var EditableNode
     */
    private $_parameter_list;

    /**
     * @var EditableNode
     */
    private $_inner_right_paren;

    /**
     * @var EditableNode
     */
    private $_colon;

    /**
     * @var EditableNode
     */
    private $_return_type;

    /**
     * @var EditableNode
     */
    private $_outer_right_paren;

    public function __construct(EditableNode $outer_left_paren, EditableNode $coroutine, EditableNode $function_keyword, EditableNode $inner_left_paren, EditableNode $parameter_list, EditableNode $inner_right_paren, EditableNode $colon, EditableNode $return_type, EditableNode $outer_right_paren)
    {
        parent::__construct('closure_type_specifier');
        $this->_outer_left_paren = $outer_left_paren;
        $this->_coroutine = $coroutine;
        $this->_function_keyword = $function_keyword;
        $this->_inner_left_paren = $inner_left_paren;
        $this->_parameter_list = $parameter_list;
        $this->_inner_right_paren = $inner_right_paren;
        $this->_colon = $colon;
        $this->_return_type = $return_type;
        $this->_outer_right_paren = $outer_right_paren;
    }

    /**
     * @return array<string, EditableNode>
     */
    public function getChildren(): array
    {
        return ['outer_left_paren' => $this->_outer_left_paren, 'coroutine' => $this->_coroutine, 'function_keyword' => $this->_function_keyword, 'inner_left_paren' => $this->_inner_left_paren, 'parameter_list' => $this->_parameter_list, 'inner_right_paren' => $this->_inner_right_paren, 'colon' => $this->_colon, 'return_type' => $this->_return_type, 'outer_right_paren' => $this->_outer_right_paren];
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
        $outer_left_paren = $this->_outer_left_paren->rewrite($rewriter, $parents);
        $coroutine = $this->_coroutine->rewrite($rewriter, $parents);
        $function_keyword = $this->_function_keyword->rewrite($rewriter, $parents);
        $inner_left_paren = $this->_inner_left_paren->rewrite($rewriter, $parents);
        $parameter_list = $this->_parameter_list->rewrite($rewriter, $parents);
        $inner_right_paren = $this->_inner_right_paren->rewrite($rewriter, $parents);
        $colon = $this->_colon->rewrite($rewriter, $parents);
        $return_type = $this->_return_type->rewrite($rewriter, $parents);
        $outer_right_paren = $this->_outer_right_paren->rewrite($rewriter, $parents);

        if ($outer_left_paren === $this->_outer_left_paren && $coroutine === $this->_coroutine && $function_keyword === $this->_function_keyword && $inner_left_paren === $this->_inner_left_paren && $parameter_list === $this->_parameter_list && $inner_right_paren === $this->_inner_right_paren && $colon === $this->_colon && $return_type === $this->_return_type && $outer_right_paren === $this->_outer_right_paren) {
            return $this;
        }

        return new static($outer_left_paren, $coroutine, $function_keyword, $inner_left_paren, $parameter_list, $inner_right_paren, $colon, $return_type, $outer_right_paren);
    }

    public function hasOuterLeftParen(): bool
    {
        return !$this->_outer_left_paren->isMissing();
    }

    public function withOuterLeftParen(EditableNode $value): self
    {
        if ($value === $this->_outer_left_paren) {
            return $this;
        }

        return new static($value, $this->_coroutine, $this->_function_keyword, $this->_inner_left_paren, $this->_parameter_list, $this->_inner_right_paren, $this->_colon, $this->_return_type, $this->_outer_right_paren);
    }

    public function getOuterLeftParen(): EditableNode
    {
        return $this->_outer_left_paren;
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

        return new static($this->_outer_left_paren, $value, $this->_function_keyword, $this->_inner_left_paren, $this->_parameter_list, $this->_inner_right_paren, $this->_colon, $this->_return_type, $this->_outer_right_paren);
    }

    public function getCoroutine(): EditableNode
    {
        return $this->_coroutine;
    }

    public function hasFunctionKeyword(): bool
    {
        return !$this->_function_keyword->isMissing();
    }

    public function withFunctionKeyword(EditableNode $value): self
    {
        if ($value === $this->_function_keyword) {
            return $this;
        }

        return new static($this->_outer_left_paren, $this->_coroutine, $value, $this->_inner_left_paren, $this->_parameter_list, $this->_inner_right_paren, $this->_colon, $this->_return_type, $this->_outer_right_paren);
    }

    public function getFunctionKeyword(): EditableNode
    {
        return $this->_function_keyword;
    }

    public function hasInnerLeftParen(): bool
    {
        return !$this->_inner_left_paren->isMissing();
    }

    public function withInnerLeftParen(EditableNode $value): self
    {
        if ($value === $this->_inner_left_paren) {
            return $this;
        }

        return new static($this->_outer_left_paren, $this->_coroutine, $this->_function_keyword, $value, $this->_parameter_list, $this->_inner_right_paren, $this->_colon, $this->_return_type, $this->_outer_right_paren);
    }

    public function getInnerLeftParen(): EditableNode
    {
        return $this->_inner_left_paren;
    }

    public function hasParameterList(): bool
    {
        return !$this->_parameter_list->isMissing();
    }

    public function withParameterList(EditableNode $value): self
    {
        if ($value === $this->_parameter_list) {
            return $this;
        }

        return new static($this->_outer_left_paren, $this->_coroutine, $this->_function_keyword, $this->_inner_left_paren, $value, $this->_inner_right_paren, $this->_colon, $this->_return_type, $this->_outer_right_paren);
    }

    public function getParameterList(): EditableNode
    {
        return $this->_parameter_list;
    }

    public function hasInnerRightParen(): bool
    {
        return !$this->_inner_right_paren->isMissing();
    }

    public function withInnerRightParen(EditableNode $value): self
    {
        if ($value === $this->_inner_right_paren) {
            return $this;
        }

        return new static($this->_outer_left_paren, $this->_coroutine, $this->_function_keyword, $this->_inner_left_paren, $this->_parameter_list, $value, $this->_colon, $this->_return_type, $this->_outer_right_paren);
    }

    public function getInnerRightParen(): EditableNode
    {
        return $this->_inner_right_paren;
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

        return new static($this->_outer_left_paren, $this->_coroutine, $this->_function_keyword, $this->_inner_left_paren, $this->_parameter_list, $this->_inner_right_paren, $value, $this->_return_type, $this->_outer_right_paren);
    }

    public function getColon(): EditableNode
    {
        return $this->_colon;
    }

    public function hasReturnType(): bool
    {
        return !$this->_return_type->isMissing();
    }

    public function withReturnType(EditableNode $value): self
    {
        if ($value === $this->_return_type) {
            return $this;
        }

        return new static($this->_outer_left_paren, $this->_coroutine, $this->_function_keyword, $this->_inner_left_paren, $this->_parameter_list, $this->_inner_right_paren, $this->_colon, $value, $this->_outer_right_paren);
    }

    public function getReturnType(): EditableNode
    {
        return $this->_return_type;
    }

    public function hasOuterRightParen(): bool
    {
        return !$this->_outer_right_paren->isMissing();
    }

    public function withOuterRightParen(EditableNode $value): self
    {
        if ($value === $this->_outer_right_paren) {
            return $this;
        }

        return new static($this->_outer_left_paren, $this->_coroutine, $this->_function_keyword, $this->_inner_left_paren, $this->_parameter_list, $this->_inner_right_paren, $this->_colon, $this->_return_type, $value);
    }

    public function getOuterRightParen(): EditableNode
    {
        return $this->_outer_right_paren;
    }
}
