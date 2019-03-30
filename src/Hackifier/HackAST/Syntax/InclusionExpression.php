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
final class InclusionExpression extends EditableNode
{
    /**
     * @var EditableNode
     */
    private $_require;

    /**
     * @var EditableNode
     */
    private $_filename;

    public function __construct(EditableNode $require, EditableNode $filename)
    {
        parent::__construct('inclusion_expression');
        $this->_require = $require;
        $this->_filename = $filename;
    }

    /**
     * @return array<string, EditableNode>
     */
    public function getChildren(): array
    {
        return ['require' => $this->_require, 'filename' => $this->_filename];
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
        $require = $this->_require->rewrite($rewriter, $parents);
        $filename = $this->_filename->rewrite($rewriter, $parents);

        if ($require === $this->_require && $filename === $this->_filename) {
            return $this;
        }

        return new static($require, $filename);
    }

    public function hasRequire(): bool
    {
        return !$this->_require->isMissing();
    }

    public function withRequire(EditableNode $value): self
    {
        if ($value === $this->_require) {
            return $this;
        }

        return new static($value, $this->_filename);
    }

    public function getRequire(): EditableNode
    {
        return $this->_require;
    }

    public function hasFilename(): bool
    {
        return !$this->_filename->isMissing();
    }

    public function withFilename(EditableNode $value): self
    {
        if ($value === $this->_filename) {
            return $this;
        }

        return new static($this->_require, $value);
    }

    public function getFilename(): EditableNode
    {
        return $this->_filename;
    }
}
