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

/**
 * @template T as \PhpParser\Node\Stmt
 * @implements IStatementTransformer<T>
 */
abstract class AbstractTransformer implements IStatementTransformer
{
    final protected function list(EditableNode ...$nodes): EditableNode
    {
        return EditableList::fromItems($nodes);
    }
}
