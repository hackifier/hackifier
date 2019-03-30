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
final class EnumDeclaration extends EditableNode
{
    /**
     * @var EditableNode
     */
    private $_attribute_spec;

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
    private $_base;

    /**
     * @var EditableNode
     */
    private $_type;

    /**
     * @var EditableNode
     */
    private $_left_brace;

    /**
     * @var EditableNode
     */
    private $_enumerators;

    /**
     * @var EditableNode
     */
    private $_right_brace;

    public function __construct(EditableNode $attribute_spec, EditableNode $keyword, EditableNode $name, EditableNode $colon, EditableNode $base, EditableNode $type, EditableNode $left_brace, EditableNode $enumerators, EditableNode $right_brace)
    {
        parent::__construct('enum_declaration');
        $this->_attribute_spec = $attribute_spec;
        $this->_keyword = $keyword;
        $this->_name = $name;
        $this->_colon = $colon;
        $this->_base = $base;
        $this->_type = $type;
        $this->_left_brace = $left_brace;
        $this->_enumerators = $enumerators;
        $this->_right_brace = $right_brace;
    }

    /**
     * @return array<string, EditableNode>
     */
    public function getChildren(): array
    {
        return ['attribute_spec' => $this->_attribute_spec, 'keyword' => $this->_keyword, 'name' => $this->_name, 'colon' => $this->_colon, 'base' => $this->_base, 'type' => $this->_type, 'left_brace' => $this->_left_brace, 'enumerators' => $this->_enumerators, 'right_brace' => $this->_right_brace];
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
        $attribute_spec = $this->_attribute_spec->rewrite($rewriter, $parents);
        $keyword = $this->_keyword->rewrite($rewriter, $parents);
        $name = $this->_name->rewrite($rewriter, $parents);
        $colon = $this->_colon->rewrite($rewriter, $parents);
        $base = $this->_base->rewrite($rewriter, $parents);
        $type = $this->_type->rewrite($rewriter, $parents);
        $left_brace = $this->_left_brace->rewrite($rewriter, $parents);
        $enumerators = $this->_enumerators->rewrite($rewriter, $parents);
        $right_brace = $this->_right_brace->rewrite($rewriter, $parents);

        if ($attribute_spec === $this->_attribute_spec && $keyword === $this->_keyword && $name === $this->_name && $colon === $this->_colon && $base === $this->_base && $type === $this->_type && $left_brace === $this->_left_brace && $enumerators === $this->_enumerators && $right_brace === $this->_right_brace) {
            return $this;
        }

        return new static($attribute_spec, $keyword, $name, $colon, $base, $type, $left_brace, $enumerators, $right_brace);
    }

    public function hasAttributeSpec(): bool
    {
        return !$this->_attribute_spec->isMissing();
    }

    public function withAttributeSpec(EditableNode $value): self
    {
        if ($value === $this->_attribute_spec) {
            return $this;
        }

        return new static($value, $this->_keyword, $this->_name, $this->_colon, $this->_base, $this->_type, $this->_left_brace, $this->_enumerators, $this->_right_brace);
    }

    public function getAttributeSpec(): EditableNode
    {
        return $this->_attribute_spec;
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

        return new static($this->_attribute_spec, $value, $this->_name, $this->_colon, $this->_base, $this->_type, $this->_left_brace, $this->_enumerators, $this->_right_brace);
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

        return new static($this->_attribute_spec, $this->_keyword, $value, $this->_colon, $this->_base, $this->_type, $this->_left_brace, $this->_enumerators, $this->_right_brace);
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

        return new static($this->_attribute_spec, $this->_keyword, $this->_name, $value, $this->_base, $this->_type, $this->_left_brace, $this->_enumerators, $this->_right_brace);
    }

    public function getColon(): EditableNode
    {
        return $this->_colon;
    }

    public function hasBase(): bool
    {
        return !$this->_base->isMissing();
    }

    public function withBase(EditableNode $value): self
    {
        if ($value === $this->_base) {
            return $this;
        }

        return new static($this->_attribute_spec, $this->_keyword, $this->_name, $this->_colon, $value, $this->_type, $this->_left_brace, $this->_enumerators, $this->_right_brace);
    }

    public function getBase(): EditableNode
    {
        return $this->_base;
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

        return new static($this->_attribute_spec, $this->_keyword, $this->_name, $this->_colon, $this->_base, $value, $this->_left_brace, $this->_enumerators, $this->_right_brace);
    }

    public function getType(): EditableNode
    {
        return $this->_type;
    }

    public function hasLeftBrace(): bool
    {
        return !$this->_left_brace->isMissing();
    }

    public function withLeftBrace(EditableNode $value): self
    {
        if ($value === $this->_left_brace) {
            return $this;
        }

        return new static($this->_attribute_spec, $this->_keyword, $this->_name, $this->_colon, $this->_base, $this->_type, $value, $this->_enumerators, $this->_right_brace);
    }

    public function getLeftBrace(): EditableNode
    {
        return $this->_left_brace;
    }

    public function hasEnumerators(): bool
    {
        return !$this->_enumerators->isMissing();
    }

    public function withEnumerators(EditableNode $value): self
    {
        if ($value === $this->_enumerators) {
            return $this;
        }

        return new static($this->_attribute_spec, $this->_keyword, $this->_name, $this->_colon, $this->_base, $this->_type, $this->_left_brace, $value, $this->_right_brace);
    }

    public function getEnumerators(): EditableNode
    {
        return $this->_enumerators;
    }

    public function hasRightBrace(): bool
    {
        return !$this->_right_brace->isMissing();
    }

    public function withRightBrace(EditableNode $value): self
    {
        if ($value === $this->_right_brace) {
            return $this;
        }

        return new static($this->_attribute_spec, $this->_keyword, $this->_name, $this->_colon, $this->_base, $this->_type, $this->_left_brace, $this->_enumerators, $value);
    }

    public function getRightBrace(): EditableNode
    {
        return $this->_right_brace;
    }
}
