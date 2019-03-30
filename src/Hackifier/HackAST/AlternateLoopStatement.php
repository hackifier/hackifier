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

use Hackifier\HackAST\Syntax\AlternateLoopStatementGeneratedBase;

final class AlternateLoopStatement extends AlternateLoopStatementGeneratedBase
{
    public function getBody(): EditableNode
    {
        return $this->getStatements();
    }

    /**
     * @param EditableNode $body
     *
     * @return static
     */
    public function withBody(EditableNode $body)
    {
        return $this->withStatements($body);
    }
}
