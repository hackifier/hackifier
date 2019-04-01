# hackifier
A proof-of-concept PHP to Hack transpiler written in PHP

## Example

`hackifier.php` : 

```php
<?php declare(strict_types=1);

use Hackifier\Transformer;

require __DIR__ . '/vendor/autoload.php';

$parser = new Hackifier\Parser();
$printer = new Hackifier\Printer();
$transformer = new Hackifier\Transformer();
$hackifier = new Hackifier\Hackifier($parser, $transformer, $printer);

$transformer->addNodeTransformer(new Transformer\IdentifierTransformer())
    ->addNodeTransformer(new Transformer\NameTransformer())
    ->addNodeTransformer(new Transformer\ParamTransformer())
    ->addNodeTransformer(new Transformer\ArgumentTransformer())
    ->addNodeTransformer(new Transformer\Scalar\LiteralNumberTransformer())
    ->addNodeTransformer(new Transformer\Scalar\LiteralStringTransformer())
    ->addNodeTransformer(new Transformer\Expression\BinaryOperationTransformer())
    ->addNodeTransformer(new Transformer\Expression\AssignOperationTransformer())
    ->addNodeTransformer(new Transformer\Expression\VariableTransformer())
    ->addNodeTransformer(new Transformer\Expression\FunctionCallTransformer())
    ->addNodeTransformer(new Transformer\Expression\ConstantFetchTransformer())
    ->addNodeTransformer(new Transformer\Statement\ExpressionTransformer())
    ->addNodeTransformer(new Transformer\Statement\ExpressionTransformer())
    ->addNodeTransformer(new Transformer\Statement\DeclareTransformer())
    ->addNodeTransformer(new Transformer\Statement\FunctionTransformer())
    ->addNodeTransformer(new Transformer\Statement\ReturnTransformer())
    ->addNodeTransformer(new Transformer\Statement\IfTransformer())
    ->addNodeTransformer(new Transformer\Statement\ElseIfTransformer())
    ->addNodeTransformer(new Transformer\Statement\ElseTransformer())
    ->addNodeTransformer(new Transformer\Expression\EmptyTransformer())
    ->addNodeTransformer(new Transformer\Expression\TernaryTransformer())
    ->addNodeTransformer(new Transformer\Scalar\MagicConstantTransformer())

    // post-processors
    ->addPostProcessor(new Hackifier\Processor\DocBlockTypesPostProcessor())
    ->addPostProcessor(new Hackifier\Processor\FloatToNumPostProcessor());

$php = file_get_contents(__DIR__ . '/code.php');
$hack = $hackifier->convert($php);
file_put_contents(__DIR__ . '/code.hack');
shell_exec('hackfmt -i ' . escapeshellarg(__DIR__) . '/code.hack');
```

`code.php` : 

```php
<?php declare(strict_types=1);

/**
 * @param string $str
 * @param null|string|int $other
 * @return string
 */
function concat(string $str, $other)
{
    return $str . $other;
}

/**
 * @param int|float $a
 * @param int|float $b
 * @return float
 */
function add($a, $b): float
{
    return $a + $b;
}

/**
 * @return stdClass::class
 */
function baz()
{
    return 'stdClass';
}
```

Run the following in your console :

```console
$ php hackifier.php
```

`code.hack` :

```hack
/**
 * @param string $str
 *
 * @param null|string|int $other
 *
 * @return string
 */
function concat(string $str, ?arraykey $other): string {
  return $str.$other;
}

/**
 * @param int|float $a
 * @param int|float $b
 *
 * @return float
 */
function add(num $a, num $b): num {
  return $a + $b;
}

/**
 * @return stdClass::class
 */
function baz(): classname<stdClass> {
  return 'stdClass';
}
```
