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

namespace Hackifier\Transformer;

use Facebook\HHAST\DelimitedComment;
use Facebook\HHAST\EditableList;
use Facebook\HHAST\EditableNode;
use Facebook\HHAST\SingleLineComment;
use PhpParser\Comment;
use PhpParser\Node;

/**
 * @template T as Node
 * @implements INodeTransformer<T>
 */
abstract class AbstractTransformer implements INodeTransformer
{
    final protected function list(EditableNode ...$nodes): EditableNode
    {
        return EditableList::fromItems($nodes);
    }

    final protected function comments(Node $php, EditableNode $node): EditableNode
    {
        $nodes = [];
        $comments = $php->getComments();

        foreach ($comments as $comment) {
            if ($comment instanceof Comment\Doc) {
                $nodes[] = new DelimitedComment($comment->getText());
            } else {
                $nodes[] = new SingleLineComment($comment->getText());
            }
        }
        $nodes[] = $node;

        return $this->list(...$nodes);
    }
}
