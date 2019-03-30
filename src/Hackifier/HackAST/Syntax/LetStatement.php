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
final class LetStatement extends EditableNode
{
    /**
     * @var EditableNode
     */
    private $_keyword;

    /**
     * @var EditableNode
     */
    private $_name;

    /**
     * @var EditableNode
     */
    private $_colon;

    /**
     * @var EditableNode
     */
    private $_type;

    /**
     * @var EditableNode
     */
    private $_initializer;

    /**
     * @var EditableNode
     */
    private $_semicolon;

    public function __construct(EditableNode $keyword, EditableNode $name, EditableNode $colon, EditableNode $type, EditableNode $initializer, EditableNode $semicolon)
    {
        parent::__construct('let_statement');
        $this->_keyword = $keyword;
        $this->_name = $name;
        $this->_colon = $colon;
        $this->_type = $type;
        $this->_initializer = $initializer;
        $this->_semicolon = $semicolon;
    }

    /**
     * @return array<string, EditableNode>
     */
    public function getChildren(): array
    {
        return ['keyword' => $this->_keyword, 'name' => $this->_name, 'colon' => $this->_colon, 'type' => $this->_type, 'initializer' => $this->_initializer, 'semicolon' => $this->_semicolon];
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
        $keyword = $this->_keyword->rewrite($rewriter, $parents);
        $name = $this->_name->rewrite($rewriter, $parents);
        $colon = $this->_colon->rewrite($rewriter, $parents);
        $type = $this->_type->rewrite($rewriter, $parents);
        $initializer = $this->_initializer->rewrite($rewriter, $parents);
        $semicolon = $this->_semicolon->rewrite($rewriter, $parents);

        if ($keyword === $this->_keyword && $name === $this->_name && $colon === $this->_colon && $type === $this->_type && $initializer === $this->_initializer && $semicolon === $this->_semicolon) {
            return $this;
        }

        return new static($keyword, $name, $colon, $type, $initializer, $semicolon);
    }

    public function hasKeyword(): bool
    {
        return !$this->_keyword->isMissing();
    }

    public function withKeyword(EditableNode $value): self
    {
        if ($value === $this->_keyword) {
            return $this;
        }

        return new static($value, $this->_name, $this->_colon, $this->_type, $this->_initializer, $this->_semicolon);
    }

    public function getKeyword(): EditableNode
    {
        return $this->_keyword;
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

        return new static($this->_keyword, $value, $this->_colon, $this->_type, $this->_initializer, $this->_semicolon);
    }

    public function getName(): EditableNode
    {
        return $this->_name;
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

        return new static($this->_keyword, $this->_name, $value, $this->_type, $this->_initializer, $this->_semicolon);
    }

    public function getColon(): EditableNode
    {
        return $this->_colon;
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

        return new static($this->_keyword, $this->_name, $this->_colon, $value, $this->_initializer, $this->_semicolon);
    }

    public function getType(): EditableNode
    {
        return $this->_type;
    }

    public function hasInitializer(): bool
    {
        return !$this->_initializer->isMissing();
    }

    public function withInitializer(EditableNode $value): self
    {
        if ($value === $this->_initializer) {
            return $this;
        }

        return new static($this->_keyword, $this->_name, $this->_colon, $this->_type, $value, $this->_semicolon);
    }

    public function getInitializer(): EditableNode
    {
        return $this->_initializer;
    }

    public function hasSemicolon(): bool
    {
        return !$this->_semicolon->isMissing();
    }

    public function withSemicolon(EditableNode $value): self
    {
        if ($value === $this->_semicolon) {
            return $this;
        }

        return new static($this->_keyword, $this->_name, $this->_colon, $this->_type, $this->_initializer, $value);
    }

    public function getSemicolon(): EditableNode
    {
        return $this->_semicolon;
    }
}
