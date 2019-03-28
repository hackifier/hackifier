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

use PhpParser\Parser as PhpParser;
use PhpParser\ParserFactory;

final class Parser implements IParser
{
    /**
     * @var PhpParser
     */
    private $parser;

    public function __construct(?PhpParser $parser = null)
    {
        $this->parser = $parser ?? (new ParserFactory())->create(ParserFactory::PREFER_PHP7);
    }

    /**
     * @return \PhpParser\Node[]
     */
    public function parse(string $code): array
    {
        return $this->parser->parse($code) ?? [];
    }
}
