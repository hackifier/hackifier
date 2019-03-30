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
final class ObjectCreationExpression extends EditableNode
{
    /**
     * @var EditableNode
     */
    private $_new_keyword;

    /**
     * @var EditableNode
     */
    private $_object;

    public function __construct(EditableNode $new_keyword, EditableNode $object)
    {
        parent::__construct('object_creation_expression');
        $this->_new_keyword = $new_keyword;
        $this->_object = $object;
    }

    /**
     * @return array<string, EditableNode>
     */
    public function getChildren(): array
    {
        return ['new_keyword' => $this->_new_keyword, 'object' => $this->_object];
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
        $new_keyword = $this->_new_keyword->rewrite($rewriter, $parents);
        $object = $this->_object->rewrite($rewriter, $parents);

        if ($new_keyword === $this->_new_keyword && $object === $this->_object) {
            return $this;
        }

        return new static($new_keyword, $object);
    }

    public function hasNewKeyword(): bool
    {
        return !$this->_new_keyword->isMissing();
    }

    public function withNewKeyword(EditableNode $value): self
    {
        if ($value === $this->_new_keyword) {
            return $this;
        }

        return new static($value, $this->_object);
    }

    public function getNewKeyword(): EditableNode
    {
        return $this->_new_keyword;
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

        return new static($this->_new_keyword, $value);
    }

    public function getObject(): EditableNode
    {
        return $this->_object;
    }
}
