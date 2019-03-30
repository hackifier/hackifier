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
final class ForStatement extends EditableNode implements IControlFlowStatement, ILoopStatement
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
    private $_initializer;

    /**
     * @var EditableNode
     */
    private $_first_semicolon;

    /**
     * @var EditableNode
     */
    private $_control;

    /**
     * @var EditableNode
     */
    private $_second_semicolon;

    /**
     * @var EditableNode
     */
    private $_end_of_loop;

    /**
     * @var EditableNode
     */
    private $_right_paren;

    /**
     * @var EditableNode
     */
    private $_body;

    public function __construct(EditableNode $keyword, EditableNode $left_paren, EditableNode $initializer, EditableNode $first_semicolon, EditableNode $control, EditableNode $second_semicolon, EditableNode $end_of_loop, EditableNode $right_paren, EditableNode $body)
    {
        parent::__construct('for_statement');
        $this->_keyword = $keyword;
        $this->_left_paren = $left_paren;
        $this->_initializer = $initializer;
        $this->_first_semicolon = $first_semicolon;
        $this->_control = $control;
        $this->_second_semicolon = $second_semicolon;
        $this->_end_of_loop = $end_of_loop;
        $this->_right_paren = $right_paren;
        $this->_body = $body;
    }

    /**
     * @return array<string, EditableNode>
     */
    public function getChildren(): array
    {
        return ['keyword' => $this->_keyword, 'left_paren' => $this->_left_paren, 'initializer' => $this->_initializer, 'first_semicolon' => $this->_first_semicolon, 'control' => $this->_control, 'second_semicolon' => $this->_second_semicolon, 'end_of_loop' => $this->_end_of_loop, 'right_paren' => $this->_right_paren, 'body' => $this->_body];
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
        $initializer = $this->_initializer->rewrite($rewriter, $parents);
        $first_semicolon = $this->_first_semicolon->rewrite($rewriter, $parents);
        $control = $this->_control->rewrite($rewriter, $parents);
        $second_semicolon = $this->_second_semicolon->rewrite($rewriter, $parents);
        $end_of_loop = $this->_end_of_loop->rewrite($rewriter, $parents);
        $right_paren = $this->_right_paren->rewrite($rewriter, $parents);
        $body = $this->_body->rewrite($rewriter, $parents);

        if ($keyword === $this->_keyword && $left_paren === $this->_left_paren && $initializer === $this->_initializer && $first_semicolon === $this->_first_semicolon && $control === $this->_control && $second_semicolon === $this->_second_semicolon && $end_of_loop === $this->_end_of_loop && $right_paren === $this->_right_paren && $body === $this->_body) {
            return $this;
        }

        return new static($keyword, $left_paren, $initializer, $first_semicolon, $control, $second_semicolon, $end_of_loop, $right_paren, $body);
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

        return new static($value, $this->_left_paren, $this->_initializer, $this->_first_semicolon, $this->_control, $this->_second_semicolon, $this->_end_of_loop, $this->_right_paren, $this->_body);
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

        return new static($this->_keyword, $value, $this->_initializer, $this->_first_semicolon, $this->_control, $this->_second_semicolon, $this->_end_of_loop, $this->_right_paren, $this->_body);
    }

    public function getLeftParen(): EditableNode
    {
        return $this->_left_paren;
    }

    public function hasInitializer(): bool
    {
        return !$this->_initializer->isMissing();
    }

    public function withInitializer(EditableNode $value): self
    {
        if ($value === $this->_initializer) {
            return $this;
        }

        return new static($this->_keyword, $this->_left_paren, $value, $this->_first_semicolon, $this->_control, $this->_second_semicolon, $this->_end_of_loop, $this->_right_paren, $this->_body);
    }

    public function getInitializer(): EditableNode
    {
        return $this->_initializer;
    }

    public function hasFirstSemicolon(): bool
    {
        return !$this->_first_semicolon->isMissing();
    }

    public function withFirstSemicolon(EditableNode $value): self
    {
        if ($value === $this->_first_semicolon) {
            return $this;
        }

        return new static($this->_keyword, $this->_left_paren, $this->_initializer, $value, $this->_control, $this->_second_semicolon, $this->_end_of_loop, $this->_right_paren, $this->_body);
    }

    public function getFirstSemicolon(): EditableNode
    {
        return $this->_first_semicolon;
    }

    public function hasControl(): bool
    {
        return !$this->_control->isMissing();
    }

    public function withControl(EditableNode $value): self
    {
        if ($value === $this->_control) {
            return $this;
        }

        return new static($this->_keyword, $this->_left_paren, $this->_initializer, $this->_first_semicolon, $value, $this->_second_semicolon, $this->_end_of_loop, $this->_right_paren, $this->_body);
    }

    public function getControl(): EditableNode
    {
        return $this->_control;
    }

    public function hasSecondSemicolon(): bool
    {
        return !$this->_second_semicolon->isMissing();
    }

    public function withSecondSemicolon(EditableNode $value): self
    {
        if ($value === $this->_second_semicolon) {
            return $this;
        }

        return new static($this->_keyword, $this->_left_paren, $this->_initializer, $this->_first_semicolon, $this->_control, $value, $this->_end_of_loop, $this->_right_paren, $this->_body);
    }

    public function getSecondSemicolon(): EditableNode
    {
        return $this->_second_semicolon;
    }

    public function hasEndOfLoop(): bool
    {
        return !$this->_end_of_loop->isMissing();
    }

    public function withEndOfLoop(EditableNode $value): self
    {
        if ($value === $this->_end_of_loop) {
            return $this;
        }

        return new static($this->_keyword, $this->_left_paren, $this->_initializer, $this->_first_semicolon, $this->_control, $this->_second_semicolon, $value, $this->_right_paren, $this->_body);
    }

    public function getEndOfLoop(): EditableNode
    {
        return $this->_end_of_loop;
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

        return new static($this->_keyword, $this->_left_paren, $this->_initializer, $this->_first_semicolon, $this->_control, $this->_second_semicolon, $this->_end_of_loop, $value, $this->_body);
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

        return new static($this->_keyword, $this->_left_paren, $this->_initializer, $this->_first_semicolon, $this->_control, $this->_second_semicolon, $this->_end_of_loop, $this->_right_paren, $value);
    }

    public function getBody(): EditableNode
    {
        return $this->_body;
    }
}
