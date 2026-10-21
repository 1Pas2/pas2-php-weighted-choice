<?php
declare(strict_types=1);
namespace Pas2\WeightedChoice;

require __DIR__ . "/../src/library.php";
echo choose(["small" => 1, "large" => 3]), PHP_EOL;
