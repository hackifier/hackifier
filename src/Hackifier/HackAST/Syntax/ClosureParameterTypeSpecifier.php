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
final class ClosureParameterTypeSpecifier extends EditableNode
{
    /**
     * @var EditableNode
     */
    private $_call_convention;

    /**
     * @var EditableNode
     */
    private $_type;

    public function __construct(EditableNode $call_convention, EditableNode $type)
    {
        parent::__construct('closure_parameter_type_specifier');
        $this->_call_convention = $call_convention;
        $this->_type = $type;
    }

    /**
     * @return array<string, EditableNode>
     */
    public function getChildren(): array
    {
        return ['call_convention' => $this->_call_convention, 'type' => $this->_type];
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

        if ($call_convention === $this->_call_convention && $type === $this->_type) {
            return $this;
        }

        return new static($call_convention, $type);
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

        return new static($value, $this->_type);
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

        return new static($this->_call_convention, $value);
    }

    public function getType(): EditableNode
    {
        return $this->_type;
    }
}
