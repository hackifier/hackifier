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
    if (strpos(\$foo, 'qux') !== false || \$baz === 'baz') {
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

Run the following in your console :

```console
$ touch sample.hack
$ php hackifier.php >> sample.hack
$ hackfmt -i sample.hack
$ hh_client sample.hack
No errors!
```

`sample.hack` :

```hack
/**
 * dummy sample
 */
function foo(string $foo, int $bar = 0, mixed $baz = null): mixed {
  // qux
  if (strpos($foo, 'qux') !== false || $baz === 'baz') {
    return str_replace(' ', '', ucwords(str_replace('_', ' ', $foo)));
  } elseif (
    /* HH_FIXME[4016] empty cannot be used in a completely type safe way and so is banned in strict mode */
    empty($foo)
  ) {
    return;
  } else {
    // foo
    return
      /* HH_FIXME[4016] empty cannot be used in a completely type safe way and so is banned in strict mode */
      empty($baz) ? $bar : $baz;
  }
}

```