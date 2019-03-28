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

namespace Hackifier\Exception;

use function get_class;
use PhpParser\Node;
use RuntimeException;
use function sprintf;

class UnsupportedNodeException extends RuntimeException implements IException
{
    /**
     * @var Node
     */
    private $node;

    public function __construct(Node $node, ?string $message = null)
    {
        $this->node = $node;
        $message = $message ?? sprintf('Unsupported PHP-Parser Node(%s).', get_class($node));
        parent::__construct($message);
    }

    public function getStatement(): Node
    {
        return $this->node;
    }
}
