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
final class CatchClause extends EditableNode
{
    /**
     * @var EditableNode
     */
    private $_keyword;

    /**
     * @var EditableNode
     */
    private $_left_paren;

    /**
     * @var EditableNode
     */
    private $_type;

    /**
     * @var EditableNode
     */
    private $_variable;

    /**
     * @var EditableNode
     */
    private $_right_paren;

    /**
     * @var EditableNode
     */
    private $_body;

    public function __construct(EditableNode $keyword, EditableNode $left_paren, EditableNode $type, EditableNode $variable, EditableNode $right_paren, EditableNode $body)
    {
        parent::__construct('catch_clause');
        $this->_keyword = $keyword;
        $this->_left_paren = $left_paren;
        $this->_type = $type;
        $this->_variable = $variable;
        $this->_right_paren = $right_paren;
        $this->_body = $body;
    }

    /**
     * @return array<string, EditableNode>
     */
    public function getChildren(): array
    {
        return ['keyword' => $this->_keyword, 'left_paren' => $this->_left_paren, 'type' => $this->_type, 'variable' => $this->_variable, 'right_paren' => $this->_right_paren, 'body' => $this->_body];
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
        $keyword = $this->_keyword->rewrite($rewriter, $parents);
        $left_paren = $this->_left_paren->rewrite($rewriter, $parents);
        $type = $this->_type->rewrite($rewriter, $parents);
        $variable = $this->_variable->rewrite($rewriter, $parents);
        $right_paren = $this->_right_paren->rewrite($rewriter, $parents);
        $body = $this->_body->rewrite($rewriter, $parents);

        if ($keyword === $this->_keyword && $left_paren === $this->_left_paren && $type === $this->_type && $variable === $this->_variable && $right_paren === $this->_right_paren && $body === $this->_body) {
            return $this;
        }

        return new static($keyword, $left_paren, $type, $variable, $right_paren, $body);
    }

    public function hasKeyword(): bool
    {
        return !$this->_keyword->isMissing();
    }

    public function withKeyword(EditableNode $value): self
    {
        if ($value === $this->_keyword) {
            return $this;
        }

        return new static($value, $this->_left_paren, $this->_type, $this->_variable, $this->_right_paren, $this->_body);
    }

    public function getKeyword(): EditableNode
    {
        return $this->_keyword;
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

        return new static($this->_keyword, $value, $this->_type, $this->_variable, $this->_right_paren, $this->_body);
    }

    public function getLeftParen(): EditableNode
    {
        return $this->_left_paren;
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

        return new static($this->_keyword, $this->_left_paren, $value, $this->_variable, $this->_right_paren, $this->_body);
    }

    public function getType(): EditableNode
    {
        return $this->_type;
    }

    public function hasVariable(): bool
    {
        return !$this->_variable->isMissing();
    }

    public function withVariable(EditableNode $value): self
    {
        if ($value === $this->_variable) {
            return $this;
        }

        return new static($this->_keyword, $this->_left_paren, $this->_type, $value, $this->_right_paren, $this->_body);
    }

    public function getVariable(): EditableNode
    {
        return $this->_variable;
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

        return new static($this->_keyword, $this->_left_paren, $this->_type, $this->_variable, $value, $this->_body);
    }

    public function getRightParen(): EditableNode
    {
        return $this->_right_paren;
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

        return new static($this->_keyword, $this->_left_paren, $this->_type, $this->_variable, $this->_right_paren, $value);
    }

    public function getBody(): EditableNode
    {
        return $this->_body;
    }
}
