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
final class TypeParameter extends EditableNode
{
    /**
     * @var EditableNode
     */
    private $_attribute_spec;

    /**
     * @var EditableNode
     */
    private $_reified;

    /**
     * @var EditableNode
     */
    private $_variance;

    /**
     * @var EditableNode
     */
    private $_name;

    /**
     * @var EditableNode
     */
    private $_constraints;

    public function __construct(EditableNode $attribute_spec, EditableNode $reified, EditableNode $variance, EditableNode $name, EditableNode $constraints)
    {
        parent::__construct('type_parameter');
        $this->_attribute_spec = $attribute_spec;
        $this->_reified = $reified;
        $this->_variance = $variance;
        $this->_name = $name;
        $this->_constraints = $constraints;
    }

    /**
     * @return array<string, EditableNode>
     */
    public function getChildren(): array
    {
        return ['attribute_spec' => $this->_attribute_spec, 'reified' => $this->_reified, 'variance' => $this->_variance, 'name' => $this->_name, 'constraints' => $this->_constraints];
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
        $reified = $this->_reified->rewrite($rewriter, $parents);
        $variance = $this->_variance->rewrite($rewriter, $parents);
        $name = $this->_name->rewrite($rewriter, $parents);
        $constraints = $this->_constraints->rewrite($rewriter, $parents);

        if ($attribute_spec === $this->_attribute_spec && $reified === $this->_reified && $variance === $this->_variance && $name === $this->_name && $constraints === $this->_constraints) {
            return $this;
        }

        return new static($attribute_spec, $reified, $variance, $name, $constraints);
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

        return new static($value, $this->_reified, $this->_variance, $this->_name, $this->_constraints);
    }

    public function getAttributeSpec(): EditableNode
    {
        return $this->_attribute_spec;
    }

    public function hasReified(): bool
    {
        return !$this->_reified->isMissing();
    }

    public function withReified(EditableNode $value): self
    {
        if ($value === $this->_reified) {
            return $this;
        }

        return new static($this->_attribute_spec, $value, $this->_variance, $this->_name, $this->_constraints);
    }

    public function getReified(): EditableNode
    {
        return $this->_reified;
    }

    public function hasVariance(): bool
    {
        return !$this->_variance->isMissing();
    }

    public function withVariance(EditableNode $value): self
    {
        if ($value === $this->_variance) {
            return $this;
        }

        return new static($this->_attribute_spec, $this->_reified, $value, $this->_name, $this->_constraints);
    }

    public function getVariance(): EditableNode
    {
        return $this->_variance;
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

        return new static($this->_attribute_spec, $this->_reified, $this->_variance, $value, $this->_constraints);
    }

    public function getName(): EditableNode
    {
        return $this->_name;
    }

    public function hasConstraints(): bool
    {
        return !$this->_constraints->isMissing();
    }

    public function withConstraints(EditableNode $value): self
    {
        if ($value === $this->_constraints) {
            return $this;
        }

        return new static($this->_attribute_spec, $this->_reified, $this->_variance, $this->_name, $value);
    }

    public function getConstraints(): EditableNode
    {
        return $this->_constraints;
    }
}
