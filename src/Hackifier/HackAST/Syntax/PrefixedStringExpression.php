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
final class PrefixedStringExpression extends EditableNode
{
    /**
     * @var EditableNode
     */
    private $_name;

    /**
     * @var EditableNode
     */
    private $_str;

    public function __construct(EditableNode $name, EditableNode $str)
    {
        parent::__construct('prefixed_string_expression');
        $this->_name = $name;
        $this->_str = $str;
    }

    /**
     * @return array<string, EditableNode>
     */
    public function getChildren(): array
    {
        return ['name' => $this->_name, 'str' => $this->_str];
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
        $name = $this->_name->rewrite($rewriter, $parents);
        $str = $this->_str->rewrite($rewriter, $parents);

        if ($name === $this->_name && $str === $this->_str) {
            return $this;
        }

        return new static($name, $str);
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

        return new static($value, $this->_str);
    }

    public function getName(): EditableNode
    {
        return $this->_name;
    }

    public function hasStr(): bool
    {
        return !$this->_str->isMissing();
    }

    public function withStr(EditableNode $value): self
    {
        if ($value === $this->_str) {
            return $this;
        }

        return new static($this->_name, $value);
    }

    public function getStr(): EditableNode
    {
        return $this->_str;
    }
}
