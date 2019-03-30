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
final class EndOfFile extends EditableNode
{
    /**
     * @var EditableNode
     */
    private $_token;

    public function __construct(EditableNode $token)
    {
        parent::__construct('end_of_file');
        $this->_token = $token;
    }

    /**
     * @return array<string, EditableNode>
     */
    public function getChildren(): array
    {
        return ['token' => $this->_token];
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
        $token = $this->_token->rewrite($rewriter, $parents);

        if ($token === $this->_token) {
            return $this;
        }

        return new static($token);
    }

    public function hasToken(): bool
    {
        return !$this->_token->isMissing();
    }

    public function withToken(EditableNode $value): self
    {
        if ($value === $this->_token) {
            return $this;
        }

        return new static($value);
    }

    public function getToken(): EditableNode
    {
        return $this->_token;
    }
}
