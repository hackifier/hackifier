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

use Hackifier\HackAST\EditableList;
use Hackifier\HackAST\EditableNode;
use function Hackifier\HackAST\Missing;
use Hackifier\HackAST\Trivia\DelimitedComment;
use Hackifier\HackAST\Trivia\EndOfLine;
use Hackifier\HackAST\Trivia\FixMe;
use Hackifier\HackAST\Trivia\IgnoreError;
use Hackifier\HackAST\Trivia\SingleLineComment;
use Hackifier\HackAST\Trivia\Unsafe;
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
                $nodes[] = new EndOfLine("\n");
            } else {
                $nodes[] = new SingleLineComment($comment->getText());
            }
        }
        $nodes[] = $node;

        return $this->list(...$nodes);
    }

    final protected function fixMe(EditableNode $node, int $code, ?string $reason = null, bool $newline = false): EditableNode
    {
        return $this->list(
            new FixMe(sprintf(
                '/* HH_FIXME[%d]%s */',
                $code,
                null !== $reason ? ' ' . $reason : ''
            )),
            $newline ? new EndOfLine("\n") : Missing(),
            $node
        );
    }

    final protected function ignoreError(EditableNode $node, int $code, ?string $reason = null, bool $newline = false): EditableNode
    {
        return $this->list(
            new IgnoreError(sprintf(
                '/* HH_IGNORE_ERROR[%d]%s */',
                $code,
                null === $reason ? ' ' . $reason : ''
            )),
            $newline ? new EndOfLine("\n") : Missing(),
            $node
        );
    }

    final protected function unsafe(EditableNode $node): EditableNode
    {
        return $this->list(
            new Unsafe('// UNSAFE'),
            new EndOfLine("\n"),
            $node
        );
    }
}
