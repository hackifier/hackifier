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

use Facebook\HHAST\EditableList;
use Facebook\HHAST\EditableNode;
use HH\Lib\C;

/**
 * @template T as \PhpParser\Node\Stmt
 * @implements IStatmentTransformer<T>
 */
abstract class AbstractTransformer implements IStatmentTransformer
{
    /**
     * Add a new node to the list.
     */
    protected function add(EditableList $list, EditableNode $node, bool $end = true): void
    {
        if ($end) {
            $last = C\lastx($list->getChildren());
            $list->replace($last, EditableList::concat($last, $node));
        } else {
            $first = C\firstx($list->getChildren());
            $list->replace($first, EditableList::concat($node, $first));
        }
    }
}
