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
final class FunctionDeclarationHeader extends EditableNode
{
    /**
     * @var EditableNode
     */
    private $_modifiers;

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
    private $_type_parameter_list;

    /**
     * @var EditableNode
     */
    private $_left_paren;

    /**
     * @var EditableNode
     */
    private $_parameter_list;

    /**
     * @var EditableNode
     */
    private $_right_paren;

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
    private $_where_clause;

    public function __construct(EditableNode $modifiers, EditableNode $keyword, EditableNode $name, EditableNode $type_parameter_list, EditableNode $left_paren, EditableNode $parameter_list, EditableNode $right_paren, EditableNode $colon, EditableNode $type, EditableNode $where_clause)
    {
        parent::__construct('function_declaration_header');
        $this->_modifiers = $modifiers;
        $this->_keyword = $keyword;
        $this->_name = $name;
        $this->_type_parameter_list = $type_parameter_list;
        $this->_left_paren = $left_paren;
        $this->_parameter_list = $parameter_list;
        $this->_right_paren = $right_paren;
        $this->_colon = $colon;
        $this->_type = $type;
        $this->_where_clause = $where_clause;
    }

    /**
     * @return array<string, EditableNode>
     */
    public function getChildren(): array
    {
        return ['modifiers' => $this->_modifiers, 'keyword' => $this->_keyword, 'name' => $this->_name, 'type_parameter_list' => $this->_type_parameter_list, 'left_paren' => $this->_left_paren, 'parameter_list' => $this->_parameter_list, 'right_paren' => $this->_right_paren, 'colon' => $this->_colon, 'type' => $this->_type, 'where_clause' => $this->_where_clause];
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
        $modifiers = $this->_modifiers->rewrite($rewriter, $parents);
        $keyword = $this->_keyword->rewrite($rewriter, $parents);
        $name = $this->_name->rewrite($rewriter, $parents);
        $type_parameter_list = $this->_type_parameter_list->rewrite($rewriter, $parents);
        $left_paren = $this->_left_paren->rewrite($rewriter, $parents);
        $parameter_list = $this->_parameter_list->rewrite($rewriter, $parents);
        $right_paren = $this->_right_paren->rewrite($rewriter, $parents);
        $colon = $this->_colon->rewrite($rewriter, $parents);
        $type = $this->_type->rewrite($rewriter, $parents);
        $where_clause = $this->_where_clause->rewrite($rewriter, $parents);

        if ($modifiers === $this->_modifiers && $keyword === $this->_keyword && $name === $this->_name && $type_parameter_list === $this->_type_parameter_list && $left_paren === $this->_left_paren && $parameter_list === $this->_parameter_list && $right_paren === $this->_right_paren && $colon === $this->_colon && $type === $this->_type && $where_clause === $this->_where_clause) {
            return $this;
        }

        return new static($modifiers, $keyword, $name, $type_parameter_list, $left_paren, $parameter_list, $right_paren, $colon, $type, $where_clause);
    }

    public function hasModifiers(): bool
    {
        return !$this->_modifiers->isMissing();
    }

    public function withModifiers(EditableNode $value): self
    {
        if ($value === $this->_modifiers) {
            return $this;
        }

        return new static($value, $this->_keyword, $this->_name, $this->_type_parameter_list, $this->_left_paren, $this->_parameter_list, $this->_right_paren, $this->_colon, $this->_type, $this->_where_clause);
    }

    public function getModifiers(): EditableNode
    {
        return $this->_modifiers;
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

        return new static($this->_modifiers, $value, $this->_name, $this->_type_parameter_list, $this->_left_paren, $this->_parameter_list, $this->_right_paren, $this->_colon, $this->_type, $this->_where_clause);
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

        return new static($this->_modifiers, $this->_keyword, $value, $this->_type_parameter_list, $this->_left_paren, $this->_parameter_list, $this->_right_paren, $this->_colon, $this->_type, $this->_where_clause);
    }

    public function getName(): EditableNode
    {
        return $this->_name;
    }

    public function hasTypeParameterList(): bool
    {
        return !$this->_type_parameter_list->isMissing();
    }

    public function withTypeParameterList(EditableNode $value): self
    {
        if ($value === $this->_type_parameter_list) {
            return $this;
        }

        return new static($this->_modifiers, $this->_keyword, $this->_name, $value, $this->_left_paren, $this->_parameter_list, $this->_right_paren, $this->_colon, $this->_type, $this->_where_clause);
    }

    public function getTypeParameterList(): EditableNode
    {
        return $this->_type_parameter_list;
    }

    public function hasLeftParen(): bool
    {
        return !$this->_left_paren->isMissing();
    }

    public function withLeftParen(EditableNode $value): self
    {
        if ($value === $this->_left_paren) {
            return $this;
        }

        return new static($this->_modifiers, $this->_keyword, $this->_name, $this->_type_parameter_list, $value, $this->_parameter_list, $this->_right_paren, $this->_colon, $this->_type, $this->_where_clause);
    }

    public function getLeftParen(): EditableNode
    {
        return $this->_left_paren;
    }

    public function hasParameterList(): bool
    {
        return !$this->_parameter_list->isMissing();
    }

    public function withParameterList(EditableNode $value): self
    {
        if ($value === $this->_parameter_list) {
            return $this;
        }

        return new static($this->_modifiers, $this->_keyword, $this->_name, $this->_type_parameter_list, $this->_left_paren, $value, $this->_right_paren, $this->_colon, $this->_type, $this->_where_clause);
    }

    public function getParameterList(): EditableNode
    {
        return $this->_parameter_list;
    }

    public function hasRightParen(): bool
    {
        return !$this->_right_paren->isMissing();
    }

    public function withRightParen(EditableNode $value): self
    {
        if ($value === $this->_right_paren) {
            return $this;
        }

        return new static($this->_modifiers, $this->_keyword, $this->_name, $this->_type_parameter_list, $this->_left_paren, $this->_parameter_list, $value, $this->_colon, $this->_type, $this->_where_clause);
    }

    public function getRightParen(): EditableNode
    {
        return $this->_right_paren;
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

        return new static($this->_modifiers, $this->_keyword, $this->_name, $this->_type_parameter_list, $this->_left_paren, $this->_parameter_list, $this->_right_paren, $value, $this->_type, $this->_where_clause);
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

        return new static($this->_modifiers, $this->_keyword, $this->_name, $this->_type_parameter_list, $this->_left_paren, $this->_parameter_list, $this->_right_paren, $this->_colon, $value, $this->_where_clause);
    }

    public function getType(): EditableNode
    {
        return $this->_type;
    }

    public function hasWhereClause(): bool
    {
        return !$this->_where_clause->isMissing();
    }

    public function withWhereClause(EditableNode $value): self
    {
        if ($value === $this->_where_clause) {
            return $this;
        }

        return new static($this->_modifiers, $this->_keyword, $this->_name, $this->_type_parameter_list, $this->_left_paren, $this->_parameter_list, $this->_right_paren, $this->_colon, $this->_type, $value);
    }

    public function getWhereClause(): EditableNode
    {
        return $this->_where_clause;
    }
}
