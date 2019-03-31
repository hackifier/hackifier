# hackifier
A proof-of-concept PHP to Hack transpiler written in PHP

## Example


```php
<?php declare(strict_types=1);

use Hackifier\{
    Parser,
    Transformer,
    Printer,
    Hackifier,
};

require __DIR__ . '/vendor/autoload.php';

$parser = new Parser();
$transformer = new Transformer();
$printer = new Printer();
$hackifier = new Hackifier($parser, $transformer, $printer);

$transformer->addNodeTransformer(new Transformer\IdentifierTransformer());
$transformer->addNodeTransformer(new Transformer\NameTransformer());
$transformer->addNodeTransformer(new Transformer\ParamTransformer());
$transformer->addNodeTransformer(new Transformer\ArgumentTransformer());
$transformer->addNodeTransformer(new Transformer\Scalar\LiteralNumberTransformer());
$transformer->addNodeTransformer(new Transformer\Scalar\LiteralStringTransformer());
$transformer->addNodeTransformer(new Transformer\Expression\BinaryOperationTransformer());
$transformer->addNodeTransformer(new Transformer\Expression\AssignOperationTransformer());
$transformer->addNodeTransformer(new Transformer\Expression\VariableTransformer());
$transformer->addNodeTransformer(new Transformer\Expression\FunctionCallTransformer());
$transformer->addNodeTransformer(new Transformer\Expression\ConstantFetchTransformer());
$transformer->addNodeTransformer(new Transformer\Statement\ExpressionTransformer());
$transformer->addNodeTransformer(new Transformer\Statement\ExpressionTransformer());
$transformer->addNodeTransformer(new Transformer\Statement\DeclareTransformer());
$transformer->addNodeTransformer(new Transformer\Statement\FunctionTransformer());
$transformer->addNodeTransformer(new Transformer\Statement\ReturnTransformer());
$transformer->addNodeTransformer(new Transformer\Statement\IfTransformer());
$transformer->addNodeTransformer(new Transformer\Statement\ElseIfTransformer());
$transformer->addNodeTransformer(new Transformer\Statement\ElseTransformer());
$transformer->addNodeTransformer(new Transformer\Expression\EmptyTransformer());
$transformer->addNodeTransformer(new Transformer\Expression\TernaryTransformer());

$php = <<<CODE
<?php declare(strict_types=1);

/**
 * dummy sample
 */
function foo(string \$foo, int \$bar = 0, \$baz = null) {
    // qux
    if (\$foo === 'baz') {
        return str_replace(' ', '', ucwords(str_replace('_', ' ', \$foo)));
    } elseif (empty(\$foo)) {
        return;
    } else {
        // foo
        return empty(\$baz) ? \$bar : \$baz;
    }
}

CODE;

echo $hackifier->convert($php);
```