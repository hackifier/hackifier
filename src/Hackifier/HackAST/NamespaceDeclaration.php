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

use Hackifier\HackAST\Syntax\NamespaceDeclarationGeneratedBase;

final class NamespaceDeclaration extends NamespaceDeclarationGeneratedBase
{
    public function getQualifiedNameAsString(): string
    {
        $name = $this->getName();

        if ($name instanceof Token\NameToken) {
            return $name->getText();
        }

        return implode('\\', array_map(static function (Token\NameToken $token): string {
            return $token->getText();
        }, $this->getDescendantsOfType(Token\NameToken::class)));
    }
}
