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

namespace Hackifier\Transformer\Expression;

use Hackifier\Exception\RuntimeException;
use Hackifier\HackAST\EditableNode;
use Hackifier\HackAST\Syntax\BinaryExpression;
use Hackifier\HackAST\Token\AmpersandEqualToken;
use Hackifier\HackAST\Token\BarEqualToken;
use Hackifier\HackAST\Token\CaratEqualToken;
use Hackifier\HackAST\Token\DotEqualToken;
use Hackifier\HackAST\Token\GreaterThanGreaterThanEqualToken;
use Hackifier\HackAST\Token\LessThanLessThanEqualToken;
use Hackifier\HackAST\Token\MinusEqualToken;
use Hackifier\HackAST\Token\PercentEqualToken;
use Hackifier\HackAST\Token\PlusEqualToken;
use Hackifier\HackAST\Token\QuestionQuestionEqualToken;
use Hackifier\HackAST\Token\SlashEqualToken;
use Hackifier\HackAST\Token\StarEqualToken;
use Hackifier\HackAST\Token\StarStarEqualToken;
use Hackifier\HackAST\Trivia\WhiteSpace;
use Hackifier\ITransformer;
use Hackifier\Transformer\AbstractTransformer;
use PhpParser\Node;

/**
 * @extends AbstractTransformer<Node\Expr\AssignOp>
 */
class AssignOperationTransformer extends AbstractTransformer
{
    /**
     * @param Node\Expr\AssignOp $node
     * @param ITransformer       $transformer
     *
     * @return EditableNode
     */
    public function transform($node, ITransformer $transformer): EditableNode
    {
        $operations = [
            'Expr_AssignOp_Mul' => StarEqualToken::class,
            'Expr_AssignOp_Coalesce' => QuestionQuestionEqualToken::class,
            'Expr_AssignOp_ShiftRight' => GreaterThanGreaterThanEqualToken::class,
            'Expr_AssignOp_ShiftLeft' => LessThanLessThanEqualToken::class,
            'Expr_AssignOp_Minus' => MinusEqualToken::class,
            'Expr_AssignOp_BitwiseXor' => CaratEqualToken::class,
            'Expr_AssignOp_Mod' => PercentEqualToken::class,
            'Expr_AssignOp_Concat' => DotEqualToken::class,
            'Expr_AssignOp_Div' => SlashEqualToken::class,
            'Expr_AssignOp_Plus' => PlusEqualToken::class,
            'Expr_AssignOp_BitwiseOr' => BarEqualToken::class,
            'Expr_AssignOp_BitwiseAnd' => AmpersandEqualToken::class,
            'Expr_AssignOp_Pow' => StarStarEqualToken::class,
        ];

        $operation = $operations[$node->getType()] ?? null;

        if (null === $operation) {
            throw new RuntimeException(sprintf('Unsupported assign operation (%s).', $node->getType()));
        }

        $operation = new $operation(new WhiteSpace(' '), new WhiteSpace(' '));

        return $this->comments($node, new BinaryExpression(
            $transformer->transform($node->var),
            $operation,
            $transformer->transform($node->expr)
        ));
    }

    public function supports(Node $node): bool
    {
        return $node instanceof Node\Expr\AssignOp;
    }
}
