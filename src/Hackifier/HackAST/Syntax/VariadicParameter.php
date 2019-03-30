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
final class VariadicParameter extends EditableNode
{
    /**
     * @var EditableNode
     */
    private $_call_convention;

    /**
     * @var EditableNode
     */
    private $_type;

    /**
     * @var EditableNode
     */
    private $_ellipsis;

    public function __construct(EditableNode $call_convention, EditableNode $type, EditableNode $ellipsis)
    {
        parent::__construct('variadic_parameter');
        $this->_call_convention = $call_convention;
        $this->_type = $type;
        $this->_ellipsis = $ellipsis;
    }

    /**
     * @return array<string, EditableNode>
     */
    public function getChildren(): array
    {
        return ['call_convention' => $this->_call_convention, 'type' => $this->_type, 'ellipsis' => $this->_ellipsis];
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
        $call_convention = $this->_call_convention->rewrite($rewriter, $parents);
        $type = $this->_type->rewrite($rewriter, $parents);
        $ellipsis = $this->_ellipsis->rewrite($rewriter, $parents);

        if ($call_convention === $this->_call_convention && $type === $this->_type && $ellipsis === $this->_ellipsis) {
            return $this;
        }

        return new static($call_convention, $type, $ellipsis);
    }

    public function hasCallConvention(): bool
    {
        return !$this->_call_convention->isMissing();
    }

    public function withCallConvention(EditableNode $value): self
    {
        if ($value === $this->_call_convention) {
            return $this;
        }

        return new static($value, $this->_type, $this->_ellipsis);
    }

    public function getCallConvention(): EditableNode
    {
        return $this->_call_convention;
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

        return new static($this->_call_convention, $value, $this->_ellipsis);
    }

    public function getType(): EditableNode
    {
        return $this->_type;
    }

    public function hasEllipsis(): bool
    {
        return !$this->_ellipsis->isMissing();
    }

    public function withEllipsis(EditableNode $value): self
    {
        if ($value === $this->_ellipsis) {
            return $this;
        }

        return new static($this->_call_convention, $this->_type, $value);
    }

    public function getEllipsis(): EditableNode
    {
        return $this->_ellipsis;
    }
}
