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

namespace Hackifier\HackAST;

/**
 * @template Titem as null|EditableNode
 */
final class EditableList extends EditableNode
{
    /**
     * @var array<int, EditableNode>
     */
    private $_children;

    /**
     * @var array<int, EditableNode>
     */
    public function __construct(array $children)
    {
        parent::__construct('list');
        $this->_children = $children;
    }

    public function isList(): bool
    {
        return true;
    }

    /**
     * @return array<int, EditableNode>
     */
    public function toVec(): array
    {
        return $this->_children;
    }

    /**
     * @return array<string, EditableNode>
     */
    public function getChildren(): array
    {
        $result = [];

        foreach ($this->_children as $k => $v) {
            $result[(string) $k] = $v;
        }

        return $result;
    }

    /**
     * @return array<int, Titem>
     */
    public function getItems(): array
    {
        // The `filter_nulls()` is needed for for expressions like
        // `list($a,,$c) = $foo` and types like `\Foo\Bar`, now that the first
        // is parsed as name token items with  backslash separators - i.e. the first
        // item is empty.
        return \array_map(static function ($child) {
            return $child instanceof Syntax\ListItem ? $child->getItem() : $child;
        }, $this->_children);
    }

    /**
     * @template T as EditableNode
     *
     * @param T::class $what
     *
     * @return array<int, T>
     */
    public function getItemsOfType(string $what): array
    {
        $out = [];

        foreach ($this->getItems() as $item) {
            if ($item instanceof $what) {
                $out[] = $item;
            }
        }

        return $out;
    }

    /**
     * @param array<int, EditableNode> $items
     *
     * @return EditableNode
     */
    public static function fromItems(array $items): EditableNode
    {
        return self::createNonEmptyListOrMissing($items);
    }

    /**
     * @param array<int, EditableNode> $items
     *
     * @return EditableNode
     */
    public static function createNonEmptyListOrMissing(array $items): EditableNode
    {
        if (0 === \count($items)) {
            return Missing();
        }

        return new self($items);
    }

    /**
     * @template T as EditableNode
     *
     * @param array<int, T> $items
     *
     * @return EditableList<T>
     */
    public static function createMaybeEmptyList(array $items): EditableList
    {
        return new self($items);
    }

    public static function concat(EditableNode $left, EditableNode $right): EditableNode
    {
        if ($left->isMissing()) {
            return $right;
        }

        if ($right->isMissing()) {
            return $left;
        }

        return new EditableList(\array_merge($right->toVec(), $left->toVec()));
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
        $dirty = false;
        $new_children = [];
        $new_parents = $parents;
        $new_parents[] = $this;

        /*
         * @var EditableNode
         */
        foreach ($this->getChildren() as $child) {
            $new_child = $child->rewrite($rewriter, $new_parents);

            if ($new_child !== $child) {
                $dirty = true;
            }

            if (null !== $new_child && !$new_child->isMissing()) {
                if ($new_child->isList()) {
                    foreach ($new_child->getChildren() as $n) {
                        $new_children[] = $n;
                    }
                } else {
                    $new_children[] = $new_child;
                }
            }
        }

        if (!$dirty) {
            return $this;
        }

        return new self($new_children);
    }

    /**
     * @param mixed                         $rewriter
     * @param array<int, EditableNode>|null $parents
     *
     * @return EditableNode
     */
    public function rewrite($rewriter, ?array $parents = null): EditableNode
    {
        $parents = $parents ?? [];
        $with_rewritten_children = $this->rewriteDescendants($rewriter, $parents);

        if (empty($with_rewritten_children->_children)) {
            $node = Missing();
        } else {
            $node = $with_rewritten_children;
        }

        return $rewriter($node, $parents);
    }
}
