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

abstract class EditableTokenWithVariableText extends EditableToken
{
    public function __construct(EditableNode $leading, EditableNode $trailing, string $token_text)
    {
        parent::__construct(static::kind(), $leading, $trailing, $token_text);
    }

    abstract protected static function kind(): string;
}
