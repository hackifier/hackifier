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
final class FieldSpecifier extends EditableNode
{
    /**
     * @var EditableNode
     */
    private $_question;

    /**
     * @var EditableNode
     */
    private $_name;

    /**
     * @var EditableNode
     */
    private $_arrow;

    /**
     * @var EditableNode
     */
    private $_type;

    public function __construct(EditableNode $question, EditableNode $name, EditableNode $arrow, EditableNode $type)
    {
        parent::__construct('field_specifier');
        $this->_question = $question;
        $this->_name = $name;
        $this->_arrow = $arrow;
        $this->_type = $type;
    }

    /**
     * @return array<string, EditableNode>
     */
    public function getChildren(): array
    {
        return ['question' => $this->_question, 'name' => $this->_name, 'arrow' => $this->_arrow, 'type' => $this->_type];
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
        $question = $this->_question->rewrite($rewriter, $parents);
        $name = $this->_name->rewrite($rewriter, $parents);
        $arrow = $this->_arrow->rewrite($rewriter, $parents);
        $type = $this->_type->rewrite($rewriter, $parents);

        if ($question === $this->_question && $name === $this->_name && $arrow === $this->_arrow && $type === $this->_type) {
            return $this;
        }

        return new static($question, $name, $arrow, $type);
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

        return new static($value, $this->_name, $this->_arrow, $this->_type);
    }

    public function getQuestion(): EditableNode
    {
        return $this->_question;
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

        return new static($this->_question, $value, $this->_arrow, $this->_type);
    }

    public function getName(): EditableNode
    {
        return $this->_name;
    }

    public function hasArrow(): bool
    {
        return !$this->_arrow->isMissing();
    }

    public function withArrow(EditableNode $value): self
    {
        if ($value === $this->_arrow) {
            return $this;
        }

        return new static($this->_question, $this->_name, $value, $this->_type);
    }

    public function getArrow(): EditableNode
    {
        return $this->_arrow;
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

        return new static($this->_question, $this->_name, $this->_arrow, $value);
    }

    public function getType(): EditableNode
    {
        return $this->_type;
    }
}
