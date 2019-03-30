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

use Hackifier\HackAST\Trivia\EndOfLine;
use Hackifier\HackAST\Trivia\WhiteSpace;

abstract class EditableToken extends EditableNode
{
    /**
     * @var string
     */
    private $_token_kind;

    /**
     * @var EditableNode
     */
    private $_leading;

    /**
     * @var EditableNode
     */
    private $_trailing;

    /**
     * @var string
     */
    private $_text;

    public function __construct(string $token_kind, EditableNode $leading, EditableNode $trailing, string $text)
    {
        parent::__construct('token');
        $this->_token_kind = $token_kind;
        $this->_leading = $leading;
        $this->_trailing = $trailing;
        $this->_text = $text;
        $this->_width = \strlen($text) + $leading->getWidth() + $trailing->getWidth();
    }

    public function getTokenKind(): string
    {
        return $this->_token_kind;
    }

    public function getText(): string
    {
        return $this->_text;
    }

    public function getLeading(): EditableNode
    {
        return $this->_leading;
    }

    final public function getLeadingWhitespace(): EditableNode
    {
        $leading = $this->getLeading();

        if ($leading->isMissing()) {
            return $leading;
        }

        if ($leading instanceof WhiteSpace || $leading instanceof EndOfLine) {
            return $leading;
        }

        if (!$leading instanceof EditableList) {
            return Missing();
        }
        $last = Missing();

        foreach ($leading->getChildren() as $child) {
            if ($child instanceof WhiteSpace || $child instanceof EndOfLine) {
                $last = $child;
            }
        }

        return $last;
    }

    final public function getTrailingWhitespace(): EditableNode
    {
        $trailing = $this->getTrailing();

        if ($trailing->isMissing()) {
            return $trailing;
        }

        if ($trailing instanceof WhiteSpace || $trailing instanceof EndOfLine) {
            return $trailing;
        }

        if (!$trailing instanceof EditableList) {
            return Missing();
        }
        $result = [];

        foreach ($trailing->getChildren() as $child) {
            if ($child instanceof WhiteSpace) {
                $result[] = $child;
            } elseif ($child instanceof EndOfLine) {
                $result[] = $child;
                break;
            }
        }

        return EditableList::createNonEmptyListOrMissing($result);
    }

    public function getTrailing(): EditableNode
    {
        return $this->_trailing;
    }

    /**
     * @return array<string, EditableNode>
     */
    public function getChildren(): array
    {
        return ['leading' => $this->getLeading(), 'trailing' => $this->getTrailing()];
    }

    final public function isToken(): bool
    {
        return true;
    }

    public function getCode(): string
    {
        return $this->getLeading()->getCode() . $this->getText() . $this->getTrailing()->getCode();
    }

    /**
     * @param EditableNode $leading
     *
     * @return static
     */
    abstract public function withLeading(EditableNode $leading);

    /**
     * @param EditableNode $trailing
     *
     * @return static
     */
    abstract public function withTrailing(EditableNode $trailing);

    final public function getFirstToken(): EditableToken
    {
        return $this;
    }

    final public function getLastToken(): EditableToken
    {
        return $this;
    }
}
