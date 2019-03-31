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
$transformer->addNodeTransformer(new Transformer\ParamTransformer());
$transformer->addNodeTransformer(new Transformer\Scalar\LiteralNumberTransformer());
$transformer->addNodeTransformer(new Transformer\Expression\BinaryOperationTransformer());
$transformer->addNodeTransformer(new Transformer\Expression\VariableTransformer());
$transformer->addNodeTransformer(new Transformer\Statement\ReturnTransformer());
$transformer->addNodeTransformer(new Transformer\Statement\DeclareTransformer());
$transformer->addNodeTransformer(new Transformer\Statement\FunctionTransformer());

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