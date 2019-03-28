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

use Hackifier\ITransformer;
use Facebook\HHAST\EditableList;
use PhpParser\Node\Stmt;

/**
 * @template T as \PhpParser\Node\Stmt
 */
interface IStatmentTransformer
{
    /**
     * @param T $stmt
     */
    public function transform($stmt, EditableList $list, ITransformer $transformer): void;

    public function supports(Stmt $stmt): bool;
}
