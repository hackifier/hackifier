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
final class ErrorSyntax extends EditableNode
{
    /**
     * @var EditableNode
     */
    private $_error;

    public function __construct(EditableNode $error)
    {
        parent::__construct('error');
        $this->_error = $error;
    }

    /**
     * @return array<string, EditableNode>
     */
    public function getChildren(): array
    {
        return ['error' => $this->_error];
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
        $error = $this->_error->rewrite($rewriter, $parents);

        if ($error === $this->_error) {
            return $this;
        }

        return new static($error);
    }

    public function hasError(): bool
    {
        return !$this->_error->isMissing();
    }

    public function withError(EditableNode $value): self
    {
        if ($value === $this->_error) {
            return $this;
        }

        return new static($value);
    }

    public function getError(): EditableNode
    {
        return $this->_error;
    }
}
