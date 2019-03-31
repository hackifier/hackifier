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
    ->addNodeTransformer(new Transformer\Scalar\MagicConstantTransformer());

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