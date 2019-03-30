<?php

declare(strict_types=1);

/**
 * This file is part of the Hackifier package.
 *
 * (c) Saif Eddin Gmati <azjezz@protonmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Hackifier;

use Hackifier\HackAST\EditableNode;
use PhpParser\Node;

final class Hackifier implements IParser, ITransformer, IPrinter
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
     * @var IPrinter
     */
    private $printer;

    public function __construct(
        IParser $parser,
        ITransformer $transformer,
        IPrinter $printer
    ) {
        $this->parser = $parser;
        $this->transformer = $transformer;
        $this->printer = $printer;
    }

    public function convert(string $php): string
    {
        $nodes = $this->parse($php);
        $ast = $this->transform(...$nodes);

        return $this->print($ast);
    }

    public function parse(string $code): array
    {
        return $this->parser->parse($code);
    }

    public function transform(Node ...$nodes): EditableNode
    {
        return $this->transformer->transform(...$nodes);
    }

    public function print(EditableNode $ast): string
    {
        return $this->printer->print($ast);
    }
}
