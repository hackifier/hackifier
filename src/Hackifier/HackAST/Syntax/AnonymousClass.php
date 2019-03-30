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
final class AnonymousClass extends EditableNode
{
    /**
     * @var EditableNode
     */
    private $_class_keyword;

    /**
     * @var EditableNode
     */
    private $_left_paren;

    /**
     * @var EditableNode
     */
    private $_argument_list;

    /**
     * @var EditableNode
     */
    private $_right_paren;

    /**
     * @var EditableNode
     */
    private $_extends_keyword;

    /**
     * @var EditableNode
     */
    private $_extends_list;

    /**
     * @var EditableNode
     */
    private $_implements_keyword;

    /**
     * @var EditableNode
     */
    private $_implements_list;

    /**
     * @var EditableNode
     */
    private $_body;

    public function __construct(EditableNode $class_keyword, EditableNode $left_paren, EditableNode $argument_list, EditableNode $right_paren, EditableNode $extends_keyword, EditableNode $extends_list, EditableNode $implements_keyword, EditableNode $implements_list, EditableNode $body)
    {
        parent::__construct('anonymous_class');
        $this->_class_keyword = $class_keyword;
        $this->_left_paren = $left_paren;
        $this->_argument_list = $argument_list;
        $this->_right_paren = $right_paren;
        $this->_extends_keyword = $extends_keyword;
        $this->_extends_list = $extends_list;
        $this->_implements_keyword = $implements_keyword;
        $this->_implements_list = $implements_list;
        $this->_body = $body;
    }

    /**
     * @return array<string, EditableNode>
     */
    public function getChildren(): array
    {
        return ['class_keyword' => $this->_class_keyword, 'left_paren' => $this->_left_paren, 'argument_list' => $this->_argument_list, 'right_paren' => $this->_right_paren, 'extends_keyword' => $this->_extends_keyword, 'extends_list' => $this->_extends_list, 'implements_keyword' => $this->_implements_keyword, 'implements_list' => $this->_implements_list, 'body' => $this->_body];
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
        $class_keyword = $this->_class_keyword->rewrite($rewriter, $parents);
        $left_paren = $this->_left_paren->rewrite($rewriter, $parents);
        $argument_list = $this->_argument_list->rewrite($rewriter, $parents);
        $right_paren = $this->_right_paren->rewrite($rewriter, $parents);
        $extends_keyword = $this->_extends_keyword->rewrite($rewriter, $parents);
        $extends_list = $this->_extends_list->rewrite($rewriter, $parents);
        $implements_keyword = $this->_implements_keyword->rewrite($rewriter, $parents);
        $implements_list = $this->_implements_list->rewrite($rewriter, $parents);
        $body = $this->_body->rewrite($rewriter, $parents);

        if ($class_keyword === $this->_class_keyword && $left_paren === $this->_left_paren && $argument_list === $this->_argument_list && $right_paren === $this->_right_paren && $extends_keyword === $this->_extends_keyword && $extends_list === $this->_extends_list && $implements_keyword === $this->_implements_keyword && $implements_list === $this->_implements_list && $body === $this->_body) {
            return $this;
        }

        return new static($class_keyword, $left_paren, $argument_list, $right_paren, $extends_keyword, $extends_list, $implements_keyword, $implements_list, $body);
    }

    public function hasClassKeyword(): bool
    {
        return !$this->_class_keyword->isMissing();
    }

    public function withClassKeyword(EditableNode $value): self
    {
        if ($value === $this->_class_keyword) {
            return $this;
        }

        return new static($value, $this->_left_paren, $this->_argument_list, $this->_right_paren, $this->_extends_keyword, $this->_extends_list, $this->_implements_keyword, $this->_implements_list, $this->_body);
    }

    public function getClassKeyword(): EditableNode
    {
        return $this->_class_keyword;
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

        return new static($this->_class_keyword, $value, $this->_argument_list, $this->_right_paren, $this->_extends_keyword, $this->_extends_list, $this->_implements_keyword, $this->_implements_list, $this->_body);
    }

    public function getLeftParen(): EditableNode
    {
        return $this->_left_paren;
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

        return new static($this->_class_keyword, $this->_left_paren, $value, $this->_right_paren, $this->_extends_keyword, $this->_extends_list, $this->_implements_keyword, $this->_implements_list, $this->_body);
    }

    public function getArgumentList(): EditableNode
    {
        return $this->_argument_list;
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

        return new static($this->_class_keyword, $this->_left_paren, $this->_argument_list, $value, $this->_extends_keyword, $this->_extends_list, $this->_implements_keyword, $this->_implements_list, $this->_body);
    }

    public function getRightParen(): EditableNode
    {
        return $this->_right_paren;
    }

    public function hasExtendsKeyword(): bool
    {
        return !$this->_extends_keyword->isMissing();
    }

    public function withExtendsKeyword(EditableNode $value): self
    {
        if ($value === $this->_extends_keyword) {
            return $this;
        }

        return new static($this->_class_keyword, $this->_left_paren, $this->_argument_list, $this->_right_paren, $value, $this->_extends_list, $this->_implements_keyword, $this->_implements_list, $this->_body);
    }

    public function getExtendsKeyword(): EditableNode
    {
        return $this->_extends_keyword;
    }

    public function hasExtendsList(): bool
    {
        return !$this->_extends_list->isMissing();
    }

    public function withExtendsList(EditableNode $value): self
    {
        if ($value === $this->_extends_list) {
            return $this;
        }

        return new static($this->_class_keyword, $this->_left_paren, $this->_argument_list, $this->_right_paren, $this->_extends_keyword, $value, $this->_implements_keyword, $this->_implements_list, $this->_body);
    }

    public function getExtendsList(): EditableNode
    {
        return $this->_extends_list;
    }

    public function hasImplementsKeyword(): bool
    {
        return !$this->_implements_keyword->isMissing();
    }

    public function withImplementsKeyword(EditableNode $value): self
    {
        if ($value === $this->_implements_keyword) {
            return $this;
        }

        return new static($this->_class_keyword, $this->_left_paren, $this->_argument_list, $this->_right_paren, $this->_extends_keyword, $this->_extends_list, $value, $this->_implements_list, $this->_body);
    }

    public function getImplementsKeyword(): EditableNode
    {
        return $this->_implements_keyword;
    }

    public function hasImplementsList(): bool
    {
        return !$this->_implements_list->isMissing();
    }

    public function withImplementsList(EditableNode $value): self
    {
        if ($value === $this->_implements_list) {
            return $this;
        }

        return new static($this->_class_keyword, $this->_left_paren, $this->_argument_list, $this->_right_paren, $this->_extends_keyword, $this->_extends_list, $this->_implements_keyword, $value, $this->_body);
    }

    public function getImplementsList(): EditableNode
    {
        return $this->_implements_list;
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

        return new static($this->_class_keyword, $this->_left_paren, $this->_argument_list, $this->_right_paren, $this->_extends_keyword, $this->_extends_list, $this->_implements_keyword, $this->_implements_list, $value);
    }

    public function getBody(): EditableNode
    {
        return $this->_body;
    }
}
