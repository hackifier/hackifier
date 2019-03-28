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
use PhpParser\Node;

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
        $nodes = $this->parse($php);
        $ast = $this->transform(...$nodes);

        return $this->compile($ast);
    }

    /**
     * @return Node[]
     */
    public function parse(string $code): array
    {
        return $this->parser->parse($code);
    }

    public function transform(Node ...$nodes): EditableList
    {
        return $this->transformer->transform(...$nodes);
    }

    public function compile(EditableList $ast): string
    {
        return $this->compiler->compile($ast);
    }
}
