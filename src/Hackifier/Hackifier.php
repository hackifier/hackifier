<?php

declare(strict_types=1);

/*
 * This file is part of the Hackifier package.
 *
 * (c) Saif Eddin Gmati <azjezz@protonmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
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
