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
