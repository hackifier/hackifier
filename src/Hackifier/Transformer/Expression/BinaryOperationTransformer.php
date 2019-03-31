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
use Hackifier\HackAST\Token\AmpersandAmpersandToken;
use Hackifier\HackAST\Token\AmpersandToken;
use Hackifier\HackAST\Token\AndToken;
use Hackifier\HackAST\Token\BarBarToken;
use Hackifier\HackAST\Token\BarToken;
use Hackifier\HackAST\Token\CaratToken;
use Hackifier\HackAST\Token\DotToken;
use Hackifier\HackAST\Token\EqualEqualEqualToken;
use Hackifier\HackAST\Token\EqualEqualToken;
use Hackifier\HackAST\Token\ExclamationEqualEqualToken;
use Hackifier\HackAST\Token\ExclamationEqualToken;
use Hackifier\HackAST\Token\GreaterThanEqualToken;
use Hackifier\HackAST\Token\GreaterThanGreaterThanToken;
use Hackifier\HackAST\Token\GreaterThanToken;
use Hackifier\HackAST\Token\LessThanEqualGreaterThanToken;
use Hackifier\HackAST\Token\LessThanEqualToken;
use Hackifier\HackAST\Token\LessThanLessThanToken;
use Hackifier\HackAST\Token\LessThanToken;
use Hackifier\HackAST\Token\MinusToken;
use Hackifier\HackAST\Token\OrToken;
use Hackifier\HackAST\Token\PercentToken;
use Hackifier\HackAST\Token\PlusToken;
use Hackifier\HackAST\Token\QuestionQuestionToken;
use Hackifier\HackAST\Token\SlashToken;
use Hackifier\HackAST\Token\StarStarToken;
use Hackifier\HackAST\Token\StarToken;
use Hackifier\HackAST\Token\XorToken;
use Hackifier\HackAST\Trivia\WhiteSpace;
use Hackifier\ITransformer;
use Hackifier\Transformer\AbstractTransformer;
use PhpParser\Node;

/**
 * @extends AbstractTransformer<Node\Expr\BinaryOp>
 */
class BinaryOperationTransformer extends AbstractTransformer
{
    /**
     * @param Node\Expr\BinaryOp $node
     * @param ITransformer       $transformer
     *
     * @return EditableNode
     */
    public function transform($node, ITransformer $transformer): EditableNode
    {
        $operations = [
            '==' => EqualEqualToken::class,
            '===' => EqualEqualEqualToken::class,
            '*' => StarToken::class,
            '**' => StarStarToken::class,
            '|' => BarToken::class,
            '||' => BarBarToken::class,
            '^' => CaratToken::class,
            '.' => DotToken::class,
            '/' => SlashToken::class,
            'xor' => XorToken::class,
            'and' => AndToken::class,
            'or' => OrToken::class,
            '+' => PlusToken::class,
            '-' => MinusToken::class,
            '>' => GreaterThanToken::class,
            '>=' => GreaterThanEqualToken::class,
            '<' => LessThanToken::class,
            '<=' => LessThanEqualToken::class,
            '!==' => ExclamationEqualEqualToken::class,
            '!=' => ExclamationEqualToken::class,
            '??' => QuestionQuestionToken::class,
            '>>' => GreaterThanGreaterThanToken::class,
            '<<' => LessThanLessThanToken::class,
            '%' => PercentToken::class,
            '<=>' => LessThanEqualGreaterThanToken::class,
            '&' => AmpersandToken::class,
            '&&' => AmpersandAmpersandToken::class,
        ];
        $operation = $operations[$node->getOperatorSigil()] ?? null;

        if (null === $operation) {
            throw new RuntimeException(sprintf('Unsupported binary operation (%s).', $node->getOperatorSigil()));
        }

        $operation = new $operation(new WhiteSpace(' '), new WhiteSpace(' '));

        return new BinaryExpression(
            $transformer->transform($node->left),
            $operation,
            $transformer->transform($node->right)
        );
    }

    public function supports(Node $node): bool
    {
        return $node instanceof Node\Expr\BinaryOp;
    }
}
