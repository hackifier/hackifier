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
final class MarkupSuffix extends EditableNode
{
    /**
     * @var EditableNode
     */
    private $_less_than_question;

    /**
     * @var EditableNode
     */
    private $_name;

    public function __construct(EditableNode $less_than_question, EditableNode $name)
    {
        parent::__construct('markup_suffix');
        $this->_less_than_question = $less_than_question;
        $this->_name = $name;
    }

    /**
     * @return array<string, EditableNode>
     */
    public function getChildren(): array
    {
        return ['less_than_question' => $this->_less_than_question, 'name' => $this->_name];
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
        $less_than_question = $this->_less_than_question->rewrite($rewriter, $parents);
        $name = $this->_name->rewrite($rewriter, $parents);

        if ($less_than_question === $this->_less_than_question && $name === $this->_name) {
            return $this;
        }

        return new static($less_than_question, $name);
    }

    public function hasLessThanQuestion(): bool
    {
        return !$this->_less_than_question->isMissing();
    }

    public function withLessThanQuestion(EditableNode $value): self
    {
        if ($value === $this->_less_than_question) {
            return $this;
        }

        return new static($value, $this->_name);
    }

    public function getLessThanQuestion(): EditableNode
    {
        return $this->_less_than_question;
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

        return new static($this->_less_than_question, $value);
    }

    public function getName(): EditableNode
    {
        return $this->_name;
    }
}
