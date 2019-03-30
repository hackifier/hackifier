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

use Closure;
use Hackifier\Exception\LogicException;

abstract class EditableNode
{
    /**
     * @var int|null
     */
    protected $_width;

    private $_syntax_kind;

    public function __construct(string $syntax_kind)
    {
        $this->_syntax_kind = $syntax_kind;
    }

    final public function __toString(): string
    {
        return $this->getCode();
    }

    public function getSyntaxKind(): string
    {
        return $this->_syntax_kind;
    }

    /**
     * @return array<string, EditableNode>
     */
    abstract public function getChildren(): array;

    /**
     * @param Closure(EditableNode):bool $filter
     *
     * @return array<string, EditableNode>
     */
    public function getChildrenWhere(Closure $filter): array
    {
        return \array_filter($this->getChildren(), $filter);
    }

    /**
     * @template T as EditableNode
     *
     * @param T::class $what
     *
     * @return array<string, T>
     */
    final public function getChildrenOfType(string $what): array
    {
        $out = [];

        foreach ($this->getChildren() as $k => $node) {
            if ($node instanceof $what) {
                $out[$k] = $node;
            }
        }

        return $out;
    }

    /**
     * @return array<int, EditableNode>
     */
    public function traverse(): array
    {
        $out = [$this];

        foreach ($this->getChildren() as $child) {
            foreach ($child->traverse() as $descendant) {
                $out[] = $descendant;
            }
        }

        return $out;
    }

    /**
     * @return array<int, (EditableNode, array<int, EditableNode>)>
     */
    public function traverseWithParents(): array
    {
        return $this->traverseImpl([]);
    }

    public function isToken(): bool
    {
        return false;
    }

    public function isTrivia(): bool
    {
        return false;
    }

    public function isList(): bool
    {
        return false;
    }

    public function isMissing(): bool
    {
        return false;
    }

    public function getWidth(): int
    {
        if (null === $this->_width) {
            $width = 0;
            /* TODO: Make an accumulation sequence operator */
            foreach ($this->getChildren() as $node) {
                $width += $node->getWidth();
            }
            $this->_width = $width;

            return $width;
        }

        return $this->_width;
    }

    public function getCode(): string
    {
        /* TODO: Make an accumulation sequence operator */
        $s = '';

        foreach ($this->getChildren() as $node) {
            $s .= $node->getCode();
        }

        return $s;
    }

    /**
     * @return array<int, EditableNode>
     */
    public function toVec(): array
    {
        return [$this];
    }

    // Returns all the parents (and the node itself) of the first node
    // that matches a predicate, or [] if there is no such node.

    /**
     * @param Closure(EditableNode):bool    $predicate
     * @param array<int, EditableNode>|null $parents
     *
     * @return array<int, EditableNode>
     */
    public function findWithParents(Closure $predicate, ?array $parents = null): array
    {
        $parents = $parents ?? [];
        $new_parents = $parents;
        $new_parents[] = $this;

        if ($predicate($this)) {
            return $new_parents;
        }

        foreach ($this->getChildren() as $child) {
            $result = $child->findWithParents($predicate, $new_parents);

            if (0 !== \count($result)) {
                return $result;
            }
        }

        return [];
    }

    /**
     * @param Closure(EditableNode, array<int, EditableNode>):bool $filter
     *
     * @return array<int, EditableNode>
     */
    public function getDescendantsWhere(Closure $filter): array
    {
        $out = [];

        foreach ($this->traverseWithParents() as [$node, $parents]) {
            if ($filter($node, $parents)) {
                $out[] = $node;
            }
        }

        return $out;
    }

    /**
     * @template T as EditableNode
     *
     * @param T::class $what
     *
     * @return array<int, T>
     */
    public function getDescendantsOfType(string $what): array
    {
        $out = [];

        foreach ($this->traverse() as $child) {
            if ($child instanceof $what) {
                $out[] = $child;
            }
        }

        return $out;
    }

    /**
     * @param Closure(EditableNode, array<int, EditableNode>|null):bool $predicate
     *
     * @return self
     */
    public function removeWhere(Closure $predicate): self
    {
        return $this->rewrite(static function ($node, $parents) use ($predicate) {
            return $predicate($node, $parents) ? Missing::getInstance() : $node;
        });
    }

    public function without(EditableNode $target): self
    {
        return $this->removeWhere(static function ($node, $_) use ($target) {
            return $node === $target;
        });
    }

    public function replace(EditableNode $target, EditableNode $new_node): self
    {
        return $this->rewriteDescendants(static function ($node, $_) use ($target, $new_node) {
            return $node === $target ? $new_node : $node;
        });
    }

    public function getFirstToken(): ?EditableToken
    {
        foreach ($this->getChildren() as $child) {
            if (!$child->isMissing()) {
                return $child->getFirstToken();
            }
        }

        return null;
    }

    /**
     * @return EditableToken|null
     */
    public function getLastToken(): ?EditableToken
    {
        /**
         * @var EditableNode
         */
        foreach (\array_reverse($this->getChildren()) as $child) {
            if (!$child->isMissing()) {
                return $child->getLastToken();
            }
        }

        return null;
    }

    public function insertBefore(EditableNode $target, EditableNode $new_node): self
    {
        // Inserting before missing is an error.
        if ($target->isMissing()) {
            throw new LogicException('Target must not be missing in insert_before.');
        }
        // Inserting missing is a no-op
        if ($new_node->isMissing()) {
            return $this;
        }

        if ($new_node->isTrivia() && !$target->isTrivia()) {
            $token = $target->getFirstToken();

            if (null === $token) {
                throw new LogicException('Unable to find token to insert trivia.');
            }
            assert($token instanceof EditableToken);
            // Inserting trivia before token is inserting to the right end of
            // the leading trivia.
            $new_leading = EditableList::concat($token->getLeading(), $new_node);
            $new_token = $token->withLeading($new_leading);

            return $this->replace($token, $new_token);
        }

        return $this->replace($target, EditableList::concat($new_node, $target));
    }

    public function insertAfter(EditableNode $target, EditableNode $new_node): self
    {
        // Inserting after missing is an error.
        if ($target->isMissing()) {
            throw new LogicException('Target must not be missing in insert_after.');
        }
        // Inserting missing is a no-op
        if ($new_node->isMissing()) {
            return $this;
        }

        if ($new_node->isTrivia() && !$target->isTrivia()) {
            $token = $target->getLastToken();

            if (null === $token) {
                throw new LogicException('Unable to find token to insert trivia.');
            }
            /*
             * @var EditableToken $token
             */
            assert($token instanceof EditableToken);
            // Inserting trivia after token is inserting to the left end of
            // the trailing trivia.
            $new_trailing = EditableList::concat($new_node, $token->getTrailing());
            $new_token = $token->withTrailing($new_trailing);

            return $this->replace($token, $new_token);
        }

        return $this->replace($target, EditableList::concat($target, $new_node));
    }

    /**
     * @param mixed                         $rewriter
     * @param array<int, EditableNode>|null $parents
     *
     * @return static
     */
    abstract public function rewriteDescendants($rewriter, ?array $parents = null);

    /**
     * @param mixed                         $rewriter
     * @param array<int, EditableNode>|null $parents
     *
     * @return static
     */
    public function rewrite($rewriter, ?array $parents = null): self
    {
        $parents = $parents ?? [];
        $with_rewritten_children = $this->rewriteDescendants($rewriter, $parents);

        return $rewriter($with_rewritten_children, $parents);
    }

    /**
     * @param array<int, EditableNode> $parents
     *
     * @return array<int, (EditableNode, array<int, EditableNode>)>
     */
    private function traverseImpl(array $parents): array
    {
        $new_parents = $parents;
        $new_parents[] = $this;
        $out = [[$this, $parents]];

        foreach ($this->getChildren() as $child) {
            foreach ($child->traverseImpl($new_parents) as [$child2, $child_parents]) {
                $out[] = [$child2, $child_parents];
            }
        }

        return $out;
    }
}
