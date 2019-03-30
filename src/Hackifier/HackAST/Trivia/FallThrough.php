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

namespace Hackifier\HackAST\Trivia;

use Hackifier\HackAST\EditableTrivia;

/**
 * This class is generated. Do not modify it manually!
 *
 * @version 2018-11-27-0001
 */
final class FallThrough extends EditableTrivia
{
    public function __construct(string $text)
    {
        parent::__construct('fall_through', $text);
    }

    public function withText(string $text): self
    {
        if ($this->getText() === $text) {
            return $this;
        }

        return new self($text);
    }
}
