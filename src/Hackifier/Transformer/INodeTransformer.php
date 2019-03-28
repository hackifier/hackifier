<?php

declare(strict_types=1);

/*
 *  Copyright (c) 2019-present, Saif Eddin Gmati.
 *
 *  All rights reserved.
 *
 *  This source code is licensed under the MIT license found in the
 *  LICENSE file in the root directory of this source tree.
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
