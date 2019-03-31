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
$transformer->addNodeTransformer(new Transformer\Statement\ExpressionTransformer());
$transformer->addNodeTransformer(new Transformer\Statement\ExpressionTransformer());
$transformer->addNodeTransformer(new Transformer\Statement\DeclareTransformer());
$transformer->addNodeTransformer(new Transformer\Statement\FunctionTransformer());
$transformer->addNodeTransformer(new Transformer\Statement\ReturnTransformer());

$php = <<<CODE
<?php 
declare(strict_types=1);

/**
 * increase a number by \$x.
 */
function inc(int \$a, int \$x = 1): int {
  return \$a + \$x;
}
CODE;

echo $hackifier->convert($php);
```