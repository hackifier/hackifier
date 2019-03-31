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

namespace Hackifier\Transformer;

use Hackifier\HackAST\EditableNode;
use function Hackifier\HackAST\Missing;
use Hackifier\HackAST\Token\NameToken;
use Hackifier\ITransformer;
use PhpParser\Node;

/**
 * @extends AbstractTransformer<Node\Identifier>
 */
class IdentifierTransformer extends AbstractTransformer
{
    /**
     * @param Node\Identifier $node
     * @param ITransformer    $transformer
     *
     * @return EditableNode
     */
    public function transform($node, ITransformer $transformer): EditableNode
    {
        return $this->comments($node, new NameToken(Missing(), Missing(), $node->name));
    }

    public function supports(Node $node): bool
    {
        return $node instanceof Node\Identifier;
    }
}
