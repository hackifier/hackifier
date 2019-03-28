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

final class Hackifier implements IParser, ITransformer, ICompiler
{
    /**
     * @var IParser
     */
    private $parser;

    /**
     * @var ITransformer
     */
    private $transformer;

    /**
     * @var ICompiler
     */
    private $compiler;

    public function __construct(
        IParser $parser,
        ITransformer $transformer,
        ICompiler $compiler
    ) {
        $this->parser = $parser;
        $this->transformer = $transformer;
        $this->compiler = $compiler;
    }

    public function convert(string $php): string
    {
        $stmts = $this->parse($php);
        $ast = $this->transform(...$stmts);

        return $this->compile($ast);
    }

    /**
     * @return \PhpParser\Node\Stmt[]
     */
    public function parse(string $code): array
    {
        return $this->parser->parse($code);
    }

    public function transform(Stmt ...$stmts): EditableList
    {
        return $this->transformer->transform(...$stmts);
    }

    public function compile(EditableList $ast): string
    {
        return $this->compiler->compile($ast);
    }
}
