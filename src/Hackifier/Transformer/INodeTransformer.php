<?php

declare(strict_types=1);

/*
 * This file is part of the Hackifier package.
 *
 * (c) Saif Eddin Gmati <azjezz@protonmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Hackifier\Transformer;

use Facebook\HHAST\EditableNode;
use Hackifier\ITransformer;
use PhpParser\Node;

/**
 * @template T as Node
 */
interface INodeTransformer
{
    /**
     * @param T $node
     */
    public function transform($node, ITransformer $transformer): EditableNode;

    public function supports(Node $node): bool;
}
