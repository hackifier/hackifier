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

namespace Hackifier\HackAST\Token;

use Hackifier\HackAST\EditableNode;
use Hackifier\HackAST\EditableTokenWithVariableText;

/**
 * This class is generated. Do not modify it manually!
 *
 * @version 2018-11-27-0001
 */
final class EndOfFileToken extends EditableTokenWithVariableText
{
    public function hasLeading(): bool
    {
        return !$this->getLeading()->isMissing();
    }

    public function withLeading(EditableNode $value): self
    {
        if ($this->getLeading() === $value) {
            return $this;
        }

        return new self($value, $this->getTrailing(), $this->getText());
    }

    public function hasTrailing(): bool
    {
        return !$this->getTrailing()->isMissing();
    }

    public function withTrailing(EditableNode $value): self
    {
        if ($this->getTrailing() === $value) {
            return $this;
        }

        return new self($this->getLeading(), $value, $this->getText());
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
        $leading = $this->getLeading()->rewrite($rewriter, $parents);
        $trailing = $this->getTrailing()->rewrite($rewriter, $parents);

        if ($this->getLeading() === $leading && $this->getTrailing() === $trailing) {
            return $this;
        }

        return new self($leading, $trailing, $this->getText());
    }

    protected static function kind(): string
    {
        return 'end_of_file';
    }
}
