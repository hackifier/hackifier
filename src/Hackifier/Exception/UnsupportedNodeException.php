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
        parent::__construct(
            $message ?? sprintf('Unsupported PHP-Parser Node(%s).', get_class($node))
        );
    }

    public function getStatement(): Node
    {
        return $this->node;
    }
}
