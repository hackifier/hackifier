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
final class Script extends EditableNode
{
    /**
     * @var EditableNode
     */
    private $_declarations;

    public function __construct(EditableNode $declarations)
    {
        parent::__construct('script');
        $this->_declarations = $declarations;
    }

    /**
     * @return array<string, EditableNode>
     */
    public function getChildren(): array
    {
        return ['declarations' => $this->_declarations];
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
        $declarations = $this->_declarations->rewrite($rewriter, $parents);

        if ($declarations === $this->_declarations) {
            return $this;
        }

        return new static($declarations);
    }

    public function hasDeclarations(): bool
    {
        return !$this->_declarations->isMissing();
    }

    public function withDeclarations(EditableNode $value): self
    {
        if ($value === $this->_declarations) {
            return $this;
        }

        return new static($value);
    }

    public function getDeclarations(): EditableNode
    {
        return $this->_declarations;
    }
}
