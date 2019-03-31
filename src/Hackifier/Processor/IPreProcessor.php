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

use PhpParser\Node;

interface IPreProcessor
{
    /**
     * Process the PHP ast node before being transformed.
     *
     * @param Node $node
     * @param int  $depth
     *
     * @return Node
     */
    public function process(Node $node, int $depth): Node;
}
