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
use Facebook\HHAST\Missing;
use PhpParser\Node\Stmt;

class Transformer implements ITransformer
{
    /**
     * @var array<int, Transformer\IStatmentTransformer<Stmt>>
     */
    private $transformers;

    /**
     * @param Transformer\IStatmentTransformer<Stmt>
     */
    public function __construct(Transformer\IStatmentTransformer ...$transformers)
    {
        $this->transformers = $transformers;
    }

    /**
     * @param Transformer\IStatmentTransformer<Stmt>
     */
    public function addStatmentTransformer(Transformer\IStatmentTransformer $transformer): void
    {
        $this->transformers[] = $transformer;
    }

    public function transform(Stmt ...$stmts): EditableList
    {
        $list = new EditableList([
            Missing::getInstance(),
        ]);

        foreach ($stmts as $stmt) {
            $this->transformStmt($stmt, $list);
        }

        return $list;
    }

    private function transformStmt(Stmt $stmt, EditableList $list): void
    {
        foreach ($this->transformers as $transformer) {
            if ($transformer->supports($stmt)) {
                $transformer->transform($stmt, $list, $this);

                return;
            }
        }

        throw new \Exception('Unsupported');
    }
}
