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

use Hackifier\Transformer\IStatmentTransformer;
use Facebook\HHAST\EditableList;
use PhpParser\Node\Stmt;

class Transformer implements ITransformer
{
    /**
     * @var array<int, IStatmentTransformer<Stmt>>
     */
    private $transformers;

    /**
     * @param array<int, IStatmentTransformer<Stmt>> $transformers
     */
    public function __construct(IStatmentTransformer ...$transformers)
    {
        $this->transformers = $transformers;
    }

    /**
     * @param IStatmentTransformer<Stmt> $transformer
     */
    public function addStatmentTransformer(IStatmentTransformer $transformer): void
    {
        $this->transformers[] = $transformer;
    }

    public function transform(Stmt ...$stmts): EditableList
    {
        $nodes = [];
        foreach ($stmts as $stmt) {
            foreach($this->transformers as $transformer) {
                if ($transformer->supports($stmt)) {
                    $nodes[] = $transformer->transform($stmt, $this);
                    break 2;
                }
            }

            throw new Exception\UnsupportedStmtException($stmt);
        }

        return new EditableList($nodes);
    }
}
