# pas2-php-weighted-choice

Choose a labeled item using cryptographically generated weighted draws.

Part of **Pas2 Polyglot** by [1Pas2](https://github.com/1Pas2): independent small projects in PHP, Python, Go and C#. No runtime dependencies outside the language standard library. Initial version: 0.1.0.

## Requirements and installation

PHP 8.3+. Use `require "path/to/src/library.php"` or configure Composer to use a local path repository. Composer metadata includes file autoloading. This package has not been published to Packagist.

## Example

```php
<?php
declare(strict_types=1);
namespace Pas2\WeightedChoice;

require __DIR__ . "/../src/library.php";
echo choose(["small" => 1, "large" => 3]), PHP_EOL;
```

## API and limits

choose(weights,draw=null) returns a key. Weights are non-negative integers with a positive bounded sum. The default uses random_int; inject draw(min,max) for deterministic tests. Zero-weight items are never selected. It does not mutate weights or provide sampling without replacement.

## Tests and example

From the repository root:

```sh
php -l src/library.php
php tests/test.php
php examples/basic.php
```

Tests use the standard library or a dependency-free executable check harness. A failing assertion exits nonzero. The example is self-contained and uses local in-memory or temporary data. CI runs the same checks on Linux. No registry releases, downloads, users or production deployments are claimed.

## Contributing

Open a focused issue or pull request with reproduction steps and a behavioral test. Run the commands above before submitting. Do not include credentials or private data in reports.

## Ecosystem

[Browse Pas2 projects](https://github.com/1Pas2?tab=repositories&q=pas2-). Each repository is usable independently. The earlier TypeScript series and this polyglot series have distinct repository names.

## License

[MIT](LICENSE) © 2026 1Pas2.

1Pas2
