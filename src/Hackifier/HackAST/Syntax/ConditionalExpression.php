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
final class ConditionalExpression extends EditableNode
{
    /**
     * @var EditableNode
     */
    private $_test;

    /**
     * @var EditableNode
     */
    private $_question;

    /**
     * @var EditableNode
     */
    private $_consequence;

    /**
     * @var EditableNode
     */
    private $_colon;

    /**
     * @var EditableNode
     */
    private $_alternative;

    public function __construct(EditableNode $test, EditableNode $question, EditableNode $consequence, EditableNode $colon, EditableNode $alternative)
    {
        parent::__construct('conditional_expression');
        $this->_test = $test;
        $this->_question = $question;
        $this->_consequence = $consequence;
        $this->_colon = $colon;
        $this->_alternative = $alternative;
    }

    /**
     * @return array<string, EditableNode>
     */
    public function getChildren(): array
    {
        return ['test' => $this->_test, 'question' => $this->_question, 'consequence' => $this->_consequence, 'colon' => $this->_colon, 'alternative' => $this->_alternative];
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
        $test = $this->_test->rewrite($rewriter, $parents);
        $question = $this->_question->rewrite($rewriter, $parents);
        $consequence = $this->_consequence->rewrite($rewriter, $parents);
        $colon = $this->_colon->rewrite($rewriter, $parents);
        $alternative = $this->_alternative->rewrite($rewriter, $parents);

        if ($test === $this->_test && $question === $this->_question && $consequence === $this->_consequence && $colon === $this->_colon && $alternative === $this->_alternative) {
            return $this;
        }

        return new static($test, $question, $consequence, $colon, $alternative);
    }

    public function hasTest(): bool
    {
        return !$this->_test->isMissing();
    }

    public function withTest(EditableNode $value): self
    {
        if ($value === $this->_test) {
            return $this;
        }

        return new static($value, $this->_question, $this->_consequence, $this->_colon, $this->_alternative);
    }

    public function getTest(): EditableNode
    {
        return $this->_test;
    }

    public function hasQuestion(): bool
    {
        return !$this->_question->isMissing();
    }

    public function withQuestion(EditableNode $value): self
    {
        if ($value === $this->_question) {
            return $this;
        }

        return new static($this->_test, $value, $this->_consequence, $this->_colon, $this->_alternative);
    }

    public function getQuestion(): EditableNode
    {
        return $this->_question;
    }

    public function hasConsequence(): bool
    {
        return !$this->_consequence->isMissing();
    }

    public function withConsequence(EditableNode $value): self
    {
        if ($value === $this->_consequence) {
            return $this;
        }

        return new static($this->_test, $this->_question, $value, $this->_colon, $this->_alternative);
    }

    public function getConsequence(): EditableNode
    {
        return $this->_consequence;
    }

    public function hasColon(): bool
    {
        return !$this->_colon->isMissing();
    }

    public function withColon(EditableNode $value): self
    {
        if ($value === $this->_colon) {
            return $this;
        }

        return new static($this->_test, $this->_question, $this->_consequence, $value, $this->_alternative);
    }

    public function getColon(): EditableNode
    {
        return $this->_colon;
    }

    public function hasAlternative(): bool
    {
        return !$this->_alternative->isMissing();
    }

    public function withAlternative(EditableNode $value): self
    {
        if ($value === $this->_alternative) {
            return $this;
        }

        return new static($this->_test, $this->_question, $this->_consequence, $this->_colon, $value);
    }

    public function getAlternative(): EditableNode
    {
        return $this->_alternative;
    }
}
