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

namespace Hackifier\HackAST;

interface INamespaceUseDeclaration
{
    /**
     * @param EditableNode $value
     *
     * @return static
     */
    public function withKeyword(EditableNode $value);

    public function hasKeyword(): bool;

    public function getKeyword(): Token\UseToken;

    /**
     * @param EditableNode $value
     *
     * @return static
     */
    public function withKind(EditableNode $value);

    public function hasKind(): bool;

    public function getKind(): EditableToken;

    public function withClauses(EditableNode $value);

    public function hasClauses(): bool;

    /**
     * @return EditableList<Syntax\NamespaceUseClause>
     */
    public function getClauses(): EditableList;

    public function getSemicolon(): Token\SemicolonToken;
}
