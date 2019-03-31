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

namespace Hackifier\Transformer\Statement;

use Hackifier\Exception\RuntimeException;
use Hackifier\HackAST\EditableList;
use Hackifier\HackAST\EditableNode;
use function Hackifier\HackAST\Missing;
use Hackifier\HackAST\Syntax\FunctionDeclaration;
use Hackifier\HackAST\Syntax\FunctionDeclarationHeader;
use Hackifier\HackAST\Token\ColonToken;
use Hackifier\HackAST\Token\CommaToken;
use Hackifier\HackAST\Token\FunctionToken;
use Hackifier\HackAST\Token\LeftBraceToken;
use Hackifier\HackAST\Token\LeftParenToken;
use Hackifier\HackAST\Token\MixedToken;
use Hackifier\HackAST\Token\RightBraceToken;
use Hackifier\HackAST\Token\RightParenToken;
use Hackifier\HackAST\Trivia\EndOfLine;
use Hackifier\HackAST\Trivia\WhiteSpace;
use Hackifier\ITransformer;
use Hackifier\Transformer\AbstractTransformer;
use PhpParser\Node;

/**
 * @extends AbstractTransformer<Node\Stmt\Function_>
 */
class FunctionTransformer extends AbstractTransformer
{
    /**
     * @param Node\Stmt\Function_ $node
     * @param ITransformer        $transformer
     *
     * @return EditableNode
     */
    public function transform($node, ITransformer $transformer): EditableNode
    {
        if ($node->byRef) {
            throw new RuntimeException('function by reference are not supported.');
        }

        return new FunctionDeclaration(
            Missing(),
            $this->transformHeader($node, $transformer),
            $this->list(
                new LeftBraceToken(new WhiteSpace(' '), new EndOfLine("\n")),
                $transformer->transform(...$node->stmts),
                new RightBraceToken(new EndOfLine("\n"), new EndOfLine("\n"))
            )
        );
    }

    public function supports(Node $node): bool
    {
        return $node instanceof Node\Stmt\Function_;
    }

    protected function transformHeader(Node\Stmt\Function_ $node, ITransformer $transformer): EditableNode
    {
        $params = $transformer->transform(...$node->params);
        $vec = $params->toVec();
        $last = count($vec) - 1;

        foreach ($vec as $i => $param) {
            $new = EditableList::concat(
                $i === $last ? Missing() : new CommaToken(Missing(), new WhiteSpace(' ')),
                $param
            );
            $params = $params->replace($param, $new);
        }

        if (null === $node->returnType) {
            $return = new MixedToken(Missing(), Missing());
        } else {
            $return = $transformer->transform($node->returnType);
        }

        return $this->comments($node, new FunctionDeclarationHeader(
            Missing(),
            new FunctionToken(Missing(), new WhiteSpace(' ')),
            $transformer->transform($node->name),
            Missing(),
            new LeftParenToken(Missing(), Missing()),
            $params,
            new RightParenToken(Missing(), Missing()),
            new ColonToken(Missing(), new WhiteSpace(' ')),
            $return,
            Missing()
        ));
    }
}
