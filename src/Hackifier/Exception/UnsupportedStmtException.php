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

use PhpParser\Node\Stmt;
use RuntimeException;
use function sprintf;
use function get_class;

class UnsupportedStmtException extends RuntimeException implements IException
{
    /**
     * @var Stmt
     */
    private $stmt;

    public function __construct(Stmt $stmt, ?string $message = null)
    {
        $this->stmt = $stmt;
        $message = $message ?? sprintf('Unsupported PHP-Parser statement %s', get_class($stmt));
        parent::__construct($message);       
    }

    public function getStatement(): Stmt {
        return $this->stmt;
    }
}
