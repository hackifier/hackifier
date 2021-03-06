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

namespace Hackifier\Processor;

use Hackifier\HackAST\EditableNode;
use Hackifier\HackAST\Token\FloatToken;
use Hackifier\HackAST\Token\NumToken;
use PhpParser\Node;

class FloatToNumPostProcessor implements IPostProcessor
{
    /**
     * Process the hack ast node `$hack` after being transformed from `$php`.
     *
     * @param Node         $php
     * @param EditableNode $hack
     * @param int          $depth
     *
     * @return EditableNode
     */
    public function process(Node $php, EditableNode $hack, int $depth): EditableNode
    {
        $floats = $hack->getDescendantsOfType(FloatToken::class);
        /** @var FloatToken $float */
        foreach ($floats as $float) {
            $hack = $hack->replace($float, new NumToken($float->getLeading(), $float->getTrailing()));
        }

        return $hack;
    }
}
