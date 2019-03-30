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
use Hackifier\HackAST\IControlFlowStatement;
use Hackifier\HackAST\ILoopStatement;

/**
 * This class is generated. Do not modify it manually!
 *
 * @version 2018-11-27-0001
 */
final class DoStatement extends EditableNode implements IControlFlowStatement, ILoopStatement
{
    /**
     * @var EditableNode
     */
    private $_keyword;

    /**
     * @var EditableNode
     */
    private $_body;

    /**
     * @var EditableNode
     */
    private $_while_keyword;

    /**
     * @var EditableNode
     */
    private $_left_paren;

    /**
     * @var EditableNode
     */
    private $_condition;

    /**
     * @var EditableNode
     */
    private $_right_paren;

    /**
     * @var EditableNode
     */
    private $_semicolon;

    public function __construct(EditableNode $keyword, EditableNode $body, EditableNode $while_keyword, EditableNode $left_paren, EditableNode $condition, EditableNode $right_paren, EditableNode $semicolon)
    {
        parent::__construct('do_statement');
        $this->_keyword = $keyword;
        $this->_body = $body;
        $this->_while_keyword = $while_keyword;
        $this->_left_paren = $left_paren;
        $this->_condition = $condition;
        $this->_right_paren = $right_paren;
        $this->_semicolon = $semicolon;
    }

    /**
     * @return array<string, EditableNode>
     */
    public function getChildren(): array
    {
        return ['keyword' => $this->_keyword, 'body' => $this->_body, 'while_keyword' => $this->_while_keyword, 'left_paren' => $this->_left_paren, 'condition' => $this->_condition, 'right_paren' => $this->_right_paren, 'semicolon' => $this->_semicolon];
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
        $body = $this->_body->rewrite($rewriter, $parents);
        $while_keyword = $this->_while_keyword->rewrite($rewriter, $parents);
        $left_paren = $this->_left_paren->rewrite($rewriter, $parents);
        $condition = $this->_condition->rewrite($rewriter, $parents);
        $right_paren = $this->_right_paren->rewrite($rewriter, $parents);
        $semicolon = $this->_semicolon->rewrite($rewriter, $parents);

        if ($keyword === $this->_keyword && $body === $this->_body && $while_keyword === $this->_while_keyword && $left_paren === $this->_left_paren && $condition === $this->_condition && $right_paren === $this->_right_paren && $semicolon === $this->_semicolon) {
            return $this;
        }

        return new static($keyword, $body, $while_keyword, $left_paren, $condition, $right_paren, $semicolon);
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

        return new static($value, $this->_body, $this->_while_keyword, $this->_left_paren, $this->_condition, $this->_right_paren, $this->_semicolon);
    }

    public function getKeyword(): EditableNode
    {
        return $this->_keyword;
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

        return new static($this->_keyword, $value, $this->_while_keyword, $this->_left_paren, $this->_condition, $this->_right_paren, $this->_semicolon);
    }

    public function getBody(): EditableNode
    {
        return $this->_body;
    }

    public function hasWhileKeyword(): bool
    {
        return !$this->_while_keyword->isMissing();
    }

    public function withWhileKeyword(EditableNode $value): self
    {
        if ($value === $this->_while_keyword) {
            return $this;
        }

        return new static($this->_keyword, $this->_body, $value, $this->_left_paren, $this->_condition, $this->_right_paren, $this->_semicolon);
    }

    public function getWhileKeyword(): EditableNode
    {
        return $this->_while_keyword;
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

        return new static($this->_keyword, $this->_body, $this->_while_keyword, $value, $this->_condition, $this->_right_paren, $this->_semicolon);
    }

    public function getLeftParen(): EditableNode
    {
        return $this->_left_paren;
    }

    public function hasCondition(): bool
    {
        return !$this->_condition->isMissing();
    }

    public function withCondition(EditableNode $value): self
    {
        if ($value === $this->_condition) {
            return $this;
        }

        return new static($this->_keyword, $this->_body, $this->_while_keyword, $this->_left_paren, $value, $this->_right_paren, $this->_semicolon);
    }

    public function getCondition(): EditableNode
    {
        return $this->_condition;
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

        return new static($this->_keyword, $this->_body, $this->_while_keyword, $this->_left_paren, $this->_condition, $value, $this->_semicolon);
    }

    public function getRightParen(): EditableNode
    {
        return $this->_right_paren;
    }

    public function hasSemicolon(): bool
    {
        return !$this->_semicolon->isMissing();
    }

    public function withSemicolon(EditableNode $value): self
    {
        if ($value === $this->_semicolon) {
            return $this;
        }

        return new static($this->_keyword, $this->_body, $this->_while_keyword, $this->_left_paren, $this->_condition, $this->_right_paren, $value);
    }

    public function getSemicolon(): EditableNode
    {
        return $this->_semicolon;
    }
}
