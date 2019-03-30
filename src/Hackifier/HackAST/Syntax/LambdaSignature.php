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
final class LambdaSignature extends EditableNode
{
    /**
     * @var EditableNode
     */
    private $_left_paren;

    /**
     * @var EditableNode
     */
    private $_parameters;

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

    public function __construct(EditableNode $left_paren, EditableNode $parameters, EditableNode $right_paren, EditableNode $colon, EditableNode $type)
    {
        parent::__construct('lambda_signature');
        $this->_left_paren = $left_paren;
        $this->_parameters = $parameters;
        $this->_right_paren = $right_paren;
        $this->_colon = $colon;
        $this->_type = $type;
    }

    /**
     * @return array<string, EditableNode>
     */
    public function getChildren(): array
    {
        return ['left_paren' => $this->_left_paren, 'parameters' => $this->_parameters, 'right_paren' => $this->_right_paren, 'colon' => $this->_colon, 'type' => $this->_type];
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
        $left_paren = $this->_left_paren->rewrite($rewriter, $parents);
        $parameters = $this->_parameters->rewrite($rewriter, $parents);
        $right_paren = $this->_right_paren->rewrite($rewriter, $parents);
        $colon = $this->_colon->rewrite($rewriter, $parents);
        $type = $this->_type->rewrite($rewriter, $parents);

        if ($left_paren === $this->_left_paren && $parameters === $this->_parameters && $right_paren === $this->_right_paren && $colon === $this->_colon && $type === $this->_type) {
            return $this;
        }

        return new static($left_paren, $parameters, $right_paren, $colon, $type);
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

        return new static($value, $this->_parameters, $this->_right_paren, $this->_colon, $this->_type);
    }

    public function getLeftParen(): EditableNode
    {
        return $this->_left_paren;
    }

    public function hasParameters(): bool
    {
        return !$this->_parameters->isMissing();
    }

    public function withParameters(EditableNode $value): self
    {
        if ($value === $this->_parameters) {
            return $this;
        }

        return new static($this->_left_paren, $value, $this->_right_paren, $this->_colon, $this->_type);
    }

    public function getParameters(): EditableNode
    {
        return $this->_parameters;
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

        return new static($this->_left_paren, $this->_parameters, $value, $this->_colon, $this->_type);
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

        return new static($this->_left_paren, $this->_parameters, $this->_right_paren, $value, $this->_type);
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

        return new static($this->_left_paren, $this->_parameters, $this->_right_paren, $this->_colon, $value);
    }

    public function getType(): EditableNode
    {
        return $this->_type;
    }
}
