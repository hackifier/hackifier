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

namespace Hackifier;

use Facebook\HHAST\EditableList;
use PhpParser\Node\Stmt;

interface ITransformer
{
    public function transform(Stmt ...$stmts): EditableList;
}