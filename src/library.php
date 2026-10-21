<?php
declare(strict_types=1);
namespace Pas2\WeightedChoice;

function choose(array $weights, ?callable $draw = null): int|string
{
    if (!$weights) {
        throw new \InvalidArgumentException("Weights cannot be empty");
    }
    $sum = 0;
    foreach ($weights as $weight) {
        if (!is_int($weight) || $weight < 0 || $sum > PHP_INT_MAX - $weight) {
            throw new \InvalidArgumentException("Invalid weights");
        }
        $sum += $weight;
    }
    if ($sum === 0) {
        throw new \InvalidArgumentException(
            "At least one positive weight required",
        );
    }
    $value = $draw ? $draw(1, $sum) : random_int(1, $sum);
    if (!is_int($value) || $value < 1 || $value > $sum) {
        throw new \UnexpectedValueException("Draw outside bounds");
    }
    foreach ($weights as $key => $weight) {
        $value -= $weight;
        if ($value <= 0) {
            return $key;
        }
    }
    throw new \LogicException("Unreachable");
}
