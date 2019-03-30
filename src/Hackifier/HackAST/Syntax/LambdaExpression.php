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
final class LambdaExpression extends EditableNode
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
    private $_signature;

    /**
     * @var EditableNode
     */
    private $_arrow;

    /**
     * @var EditableNode
     */
    private $_body;

    public function __construct(EditableNode $attribute_spec, EditableNode $async, EditableNode $coroutine, EditableNode $signature, EditableNode $arrow, EditableNode $body)
    {
        parent::__construct('lambda_expression');
        $this->_attribute_spec = $attribute_spec;
        $this->_async = $async;
        $this->_coroutine = $coroutine;
        $this->_signature = $signature;
        $this->_arrow = $arrow;
        $this->_body = $body;
    }

    /**
     * @return array<string, EditableNode>
     */
    public function getChildren(): array
    {
        return ['attribute_spec' => $this->_attribute_spec, 'async' => $this->_async, 'coroutine' => $this->_coroutine, 'signature' => $this->_signature, 'arrow' => $this->_arrow, 'body' => $this->_body];
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
        $signature = $this->_signature->rewrite($rewriter, $parents);
        $arrow = $this->_arrow->rewrite($rewriter, $parents);
        $body = $this->_body->rewrite($rewriter, $parents);

        if ($attribute_spec === $this->_attribute_spec && $async === $this->_async && $coroutine === $this->_coroutine && $signature === $this->_signature && $arrow === $this->_arrow && $body === $this->_body) {
            return $this;
        }

        return new static($attribute_spec, $async, $coroutine, $signature, $arrow, $body);
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

        return new static($value, $this->_async, $this->_coroutine, $this->_signature, $this->_arrow, $this->_body);
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

        return new static($this->_attribute_spec, $value, $this->_coroutine, $this->_signature, $this->_arrow, $this->_body);
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

        return new static($this->_attribute_spec, $this->_async, $value, $this->_signature, $this->_arrow, $this->_body);
    }

    public function getCoroutine(): EditableNode
    {
        return $this->_coroutine;
    }

    public function hasSignature(): bool
    {
        return !$this->_signature->isMissing();
    }

    public function withSignature(EditableNode $value): self
    {
        if ($value === $this->_signature) {
            return $this;
        }

        return new static($this->_attribute_spec, $this->_async, $this->_coroutine, $value, $this->_arrow, $this->_body);
    }

    public function getSignature(): EditableNode
    {
        return $this->_signature;
    }

    public function hasArrow(): bool
    {
        return !$this->_arrow->isMissing();
    }

    public function withArrow(EditableNode $value): self
    {
        if ($value === $this->_arrow) {
            return $this;
        }

        return new static($this->_attribute_spec, $this->_async, $this->_coroutine, $this->_signature, $value, $this->_body);
    }

    public function getArrow(): EditableNode
    {
        return $this->_arrow;
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

        return new static($this->_attribute_spec, $this->_async, $this->_coroutine, $this->_signature, $this->_arrow, $value);
    }

    public function getBody(): EditableNode
    {
        return $this->_body;
    }
}
