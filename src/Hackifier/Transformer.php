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
use Facebook\HHAST\EditableNode;
use Hackifier\Transformer\IStatementTransformer;
use PhpParser\Node\Stmt;

class Transformer implements ITransformer
{
    /**
     * @var array<int, IStatementTransformer<Stmt>>
     */
    private $transformers;

    /**
     * @param array<int, IStatementTransformer<Stmt>> $transformers
     */
    public function __construct(IStatementTransformer ...$transformers)
    {
        $this->transformers = $transformers;
    }

    /**
     * @param IStatementTransformer<Stmt> $transformer
     */
    public function addStatementTransformer(IStatementTransformer $transformer): void
    {
        $this->transformers[] = $transformer;
    }

    public function transform(Stmt ...$stmts): EditableList
    {
        $nodes = [];

        foreach ($stmts as $stmt) {
            $nodes[] = $this->transformStmt($stmt);
        }

        return new EditableList($nodes);
    }

    private function transformStmt(Stmt $stmt): EditableNode
    {
        foreach ($this->transformers as $transformer) {
            if ($transformer->supports($stmt)) {
                return $transformer->transform($stmt, $this);
            }
        }

        throw new Exception\UnsupportedStmtException($stmt);
    }
}
