<?php
declare(strict_types=1);
namespace Pas2\WeightedChoice;

require __DIR__ . "/../src/library.php";
function check(bool $condition, string $message): void
{
    if (!$condition) {
        throw new \RuntimeException($message);
    }
}
function fails(callable $fn): void
{
    try {
        $fn();
    } catch (\Throwable) {
        return;
    }
    throw new \RuntimeException("Expected failure");
}
check(
    choose(["a" => 1, "b" => 3], fn($min, $max) => 1) === "a",
    "first boundary",
);
check(
    choose(["a" => 1, "b" => 3], fn($min, $max) => 2) === "b",
    "second boundary",
);
check(choose(["zero" => 0, "yes" => 1]) === "yes", "zero excluded");
fails(fn() => choose([0, 0]));
fails(fn() => choose([-1]));
fails(fn() => choose([1], fn() => 2));
echo "All checks passed\n";
