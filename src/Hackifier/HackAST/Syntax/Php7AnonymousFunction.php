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
final class Php7AnonymousFunction extends EditableNode
{
    /**
     * @var EditableNode
     */
    private $_attribute_spec;

    /**
     * @var EditableNode
     */
    private $_static_keyword;

    /**
     * @var EditableNode
     */
    private $_async_keyword;

    /**
     * @var EditableNode
     */
    private $_coroutine_keyword;

    /**
     * @var EditableNode
     */
    private $_function_keyword;

    /**
     * @var EditableNode
     */
    private $_left_paren;

    /**
     * @var EditableNode
     */
    private $_parameters;

    /**
     * @var EditableNode
     */
    private $_right_paren;

    /**
     * @var EditableNode
     */
    private $_use;

    /**
     * @var EditableNode
     */
    private $_colon;

    /**
     * @var EditableNode
     */
    private $_type;

    /**
     * @var EditableNode
     */
    private $_body;

    public function __construct(EditableNode $attribute_spec, EditableNode $static_keyword, EditableNode $async_keyword, EditableNode $coroutine_keyword, EditableNode $function_keyword, EditableNode $left_paren, EditableNode $parameters, EditableNode $right_paren, EditableNode $use, EditableNode $colon, EditableNode $type, EditableNode $body)
    {
        parent::__construct('php7_anonymous_function');
        $this->_attribute_spec = $attribute_spec;
        $this->_static_keyword = $static_keyword;
        $this->_async_keyword = $async_keyword;
        $this->_coroutine_keyword = $coroutine_keyword;
        $this->_function_keyword = $function_keyword;
        $this->_left_paren = $left_paren;
        $this->_parameters = $parameters;
        $this->_right_paren = $right_paren;
        $this->_use = $use;
        $this->_colon = $colon;
        $this->_type = $type;
        $this->_body = $body;
    }

    /**
     * @return array<string, EditableNode>
     */
    public function getChildren(): array
    {
        return ['attribute_spec' => $this->_attribute_spec, 'static_keyword' => $this->_static_keyword, 'async_keyword' => $this->_async_keyword, 'coroutine_keyword' => $this->_coroutine_keyword, 'function_keyword' => $this->_function_keyword, 'left_paren' => $this->_left_paren, 'parameters' => $this->_parameters, 'right_paren' => $this->_right_paren, 'use' => $this->_use, 'colon' => $this->_colon, 'type' => $this->_type, 'body' => $this->_body];
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
        $static_keyword = $this->_static_keyword->rewrite($rewriter, $parents);
        $async_keyword = $this->_async_keyword->rewrite($rewriter, $parents);
        $coroutine_keyword = $this->_coroutine_keyword->rewrite($rewriter, $parents);
        $function_keyword = $this->_function_keyword->rewrite($rewriter, $parents);
        $left_paren = $this->_left_paren->rewrite($rewriter, $parents);
        $parameters = $this->_parameters->rewrite($rewriter, $parents);
        $right_paren = $this->_right_paren->rewrite($rewriter, $parents);
        $use = $this->_use->rewrite($rewriter, $parents);
        $colon = $this->_colon->rewrite($rewriter, $parents);
        $type = $this->_type->rewrite($rewriter, $parents);
        $body = $this->_body->rewrite($rewriter, $parents);

        if ($attribute_spec === $this->_attribute_spec && $static_keyword === $this->_static_keyword && $async_keyword === $this->_async_keyword && $coroutine_keyword === $this->_coroutine_keyword && $function_keyword === $this->_function_keyword && $left_paren === $this->_left_paren && $parameters === $this->_parameters && $right_paren === $this->_right_paren && $use === $this->_use && $colon === $this->_colon && $type === $this->_type && $body === $this->_body) {
            return $this;
        }

        return new static($attribute_spec, $static_keyword, $async_keyword, $coroutine_keyword, $function_keyword, $left_paren, $parameters, $right_paren, $use, $colon, $type, $body);
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

        return new static($value, $this->_static_keyword, $this->_async_keyword, $this->_coroutine_keyword, $this->_function_keyword, $this->_left_paren, $this->_parameters, $this->_right_paren, $this->_use, $this->_colon, $this->_type, $this->_body);
    }

    public function getAttributeSpec(): EditableNode
    {
        return $this->_attribute_spec;
    }

    public function hasStaticKeyword(): bool
    {
        return !$this->_static_keyword->isMissing();
    }

    public function withStaticKeyword(EditableNode $value): self
    {
        if ($value === $this->_static_keyword) {
            return $this;
        }

        return new static($this->_attribute_spec, $value, $this->_async_keyword, $this->_coroutine_keyword, $this->_function_keyword, $this->_left_paren, $this->_parameters, $this->_right_paren, $this->_use, $this->_colon, $this->_type, $this->_body);
    }

    public function getStaticKeyword(): EditableNode
    {
        return $this->_static_keyword;
    }

    public function hasAsyncKeyword(): bool
    {
        return !$this->_async_keyword->isMissing();
    }

    public function withAsyncKeyword(EditableNode $value): self
    {
        if ($value === $this->_async_keyword) {
            return $this;
        }

        return new static($this->_attribute_spec, $this->_static_keyword, $value, $this->_coroutine_keyword, $this->_function_keyword, $this->_left_paren, $this->_parameters, $this->_right_paren, $this->_use, $this->_colon, $this->_type, $this->_body);
    }

    public function getAsyncKeyword(): EditableNode
    {
        return $this->_async_keyword;
    }

    public function hasCoroutineKeyword(): bool
    {
        return !$this->_coroutine_keyword->isMissing();
    }

    public function withCoroutineKeyword(EditableNode $value): self
    {
        if ($value === $this->_coroutine_keyword) {
            return $this;
        }

        return new static($this->_attribute_spec, $this->_static_keyword, $this->_async_keyword, $value, $this->_function_keyword, $this->_left_paren, $this->_parameters, $this->_right_paren, $this->_use, $this->_colon, $this->_type, $this->_body);
    }

    public function getCoroutineKeyword(): EditableNode
    {
        return $this->_coroutine_keyword;
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

        return new static($this->_attribute_spec, $this->_static_keyword, $this->_async_keyword, $this->_coroutine_keyword, $value, $this->_left_paren, $this->_parameters, $this->_right_paren, $this->_use, $this->_colon, $this->_type, $this->_body);
    }

    public function getFunctionKeyword(): EditableNode
    {
        return $this->_function_keyword;
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

        return new static($this->_attribute_spec, $this->_static_keyword, $this->_async_keyword, $this->_coroutine_keyword, $this->_function_keyword, $value, $this->_parameters, $this->_right_paren, $this->_use, $this->_colon, $this->_type, $this->_body);
    }

    public function getLeftParen(): EditableNode
    {
        return $this->_left_paren;
    }

    public function hasParameters(): bool
    {
        return !$this->_parameters->isMissing();
    }

    public function withParameters(EditableNode $value): self
    {
        if ($value === $this->_parameters) {
            return $this;
        }

        return new static($this->_attribute_spec, $this->_static_keyword, $this->_async_keyword, $this->_coroutine_keyword, $this->_function_keyword, $this->_left_paren, $value, $this->_right_paren, $this->_use, $this->_colon, $this->_type, $this->_body);
    }

    public function getParameters(): EditableNode
    {
        return $this->_parameters;
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

        return new static($this->_attribute_spec, $this->_static_keyword, $this->_async_keyword, $this->_coroutine_keyword, $this->_function_keyword, $this->_left_paren, $this->_parameters, $value, $this->_use, $this->_colon, $this->_type, $this->_body);
    }

    public function getRightParen(): EditableNode
    {
        return $this->_right_paren;
    }

    public function hasUse(): bool
    {
        return !$this->_use->isMissing();
    }

    public function withUse(EditableNode $value): self
    {
        if ($value === $this->_use) {
            return $this;
        }

        return new static($this->_attribute_spec, $this->_static_keyword, $this->_async_keyword, $this->_coroutine_keyword, $this->_function_keyword, $this->_left_paren, $this->_parameters, $this->_right_paren, $value, $this->_colon, $this->_type, $this->_body);
    }

    public function getUse(): EditableNode
    {
        return $this->_use;
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

        return new static($this->_attribute_spec, $this->_static_keyword, $this->_async_keyword, $this->_coroutine_keyword, $this->_function_keyword, $this->_left_paren, $this->_parameters, $this->_right_paren, $this->_use, $value, $this->_type, $this->_body);
    }

    public function getColon(): EditableNode
    {
        return $this->_colon;
    }

    public function hasType(): bool
    {
        return !$this->_type->isMissing();
    }

    public function withType(EditableNode $value): self
    {
        if ($value === $this->_type) {
            return $this;
        }

        return new static($this->_attribute_spec, $this->_static_keyword, $this->_async_keyword, $this->_coroutine_keyword, $this->_function_keyword, $this->_left_paren, $this->_parameters, $this->_right_paren, $this->_use, $this->_colon, $value, $this->_body);
    }

    public function getType(): EditableNode
    {
        return $this->_type;
    }

    public function hasBody(): bool
    {
        return !$this->_body->isMissing();
    }

    public function withBody(EditableNode $value): self
    {
        if ($value === $this->_body) {
            return $this;
        }

        return new static($this->_attribute_spec, $this->_static_keyword, $this->_async_keyword, $this->_coroutine_keyword, $this->_function_keyword, $this->_left_paren, $this->_parameters, $this->_right_paren, $this->_use, $this->_colon, $this->_type, $value);
    }

    public function getBody(): EditableNode
    {
        return $this->_body;
    }
}
