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
     * @return \PhpParser\Node\Stmt[]
     */
    public function parse(string $code): array
    {
        return $this->parser->parse($code) ?? [];
    }
}
