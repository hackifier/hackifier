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
final class EmbeddedMemberSelectionExpression extends EditableNode
{
    /**
     * @var EditableNode
     */
    private $_object;

    /**
     * @var EditableNode
     */
    private $_operator;

    /**
     * @var EditableNode
     */
    private $_name;

    public function __construct(EditableNode $object, EditableNode $operator, EditableNode $name)
    {
        parent::__construct('embedded_member_selection_expression');
        $this->_object = $object;
        $this->_operator = $operator;
        $this->_name = $name;
    }

    /**
     * @return array<string, EditableNode>
     */
    public function getChildren(): array
    {
        return ['object' => $this->_object, 'operator' => $this->_operator, 'name' => $this->_name];
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
        $object = $this->_object->rewrite($rewriter, $parents);
        $operator = $this->_operator->rewrite($rewriter, $parents);
        $name = $this->_name->rewrite($rewriter, $parents);

        if ($object === $this->_object && $operator === $this->_operator && $name === $this->_name) {
            return $this;
        }

        return new static($object, $operator, $name);
    }

    public function hasObject(): bool
    {
        return !$this->_object->isMissing();
    }

    public function withObject(EditableNode $value): self
    {
        if ($value === $this->_object) {
            return $this;
        }

        return new static($value, $this->_operator, $this->_name);
    }

    public function getObject(): EditableNode
    {
        return $this->_object;
    }

    public function hasOperator(): bool
    {
        return !$this->_operator->isMissing();
    }

    public function withOperator(EditableNode $value): self
    {
        if ($value === $this->_operator) {
            return $this;
        }

        return new static($this->_object, $value, $this->_name);
    }

    public function getOperator(): EditableNode
    {
        return $this->_operator;
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

        return new static($this->_object, $this->_operator, $value);
    }

    public function getName(): EditableNode
    {
        return $this->_name;
    }
}
