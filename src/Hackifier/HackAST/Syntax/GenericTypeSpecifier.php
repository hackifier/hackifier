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
final class GenericTypeSpecifier extends EditableNode
{
    /**
     * @var EditableNode
     */
    private $_class_type;

    /**
     * @var EditableNode
     */
    private $_argument_list;

    public function __construct(EditableNode $class_type, EditableNode $argument_list)
    {
        parent::__construct('generic_type_specifier');
        $this->_class_type = $class_type;
        $this->_argument_list = $argument_list;
    }

    /**
     * @return array<string, EditableNode>
     */
    public function getChildren(): array
    {
        return ['class_type' => $this->_class_type, 'argument_list' => $this->_argument_list];
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
        $class_type = $this->_class_type->rewrite($rewriter, $parents);
        $argument_list = $this->_argument_list->rewrite($rewriter, $parents);

        if ($class_type === $this->_class_type && $argument_list === $this->_argument_list) {
            return $this;
        }

        return new static($class_type, $argument_list);
    }

    public function hasClassType(): bool
    {
        return !$this->_class_type->isMissing();
    }

    public function withClassType(EditableNode $value): self
    {
        if ($value === $this->_class_type) {
            return $this;
        }

        return new static($value, $this->_argument_list);
    }

    public function getClassType(): EditableNode
    {
        return $this->_class_type;
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

        return new static($this->_class_type, $value);
    }

    public function getArgumentList(): EditableNode
    {
        return $this->_argument_list;
    }
}
