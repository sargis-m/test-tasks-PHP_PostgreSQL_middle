<?php

// Задача 4

$matrix = [
    [51, 71, 1, 50],
    [13, 5, 19, 11],
    [60, 4, 11, 20],
    [13, 34, 17, 0],
    [16, 53, 1, 32]
];

function neighborsSum($matrix, $rowIndex, $colIndex)
{
    $sum = 0;
    $left = $colIndex - 1;
    $right = $colIndex + 1;
    $top = $rowIndex - 1;
    $bottom = $rowIndex + 1;

    if ($left >= 0) {
        $sum += $matrix[$rowIndex][$colIndex - 1];
    }
    if ($right < count($matrix[$rowIndex])) {
        $sum += $matrix[$rowIndex][$colIndex + 1];
    }

    if ($top >= 0) {
        $sum += $matrix[$rowIndex - 1][$colIndex];
    }

    if ($bottom < count($matrix)) {
        $sum += $matrix[$rowIndex + 1][$colIndex];
    }

    return $sum;
}

$rowIndex = 3;
$colIndex = 2;
$sum = neighborsSum($matrix, $rowIndex, $colIndex);

echo "Neighbors sum for indexes ($rowIndex, $colIndex): $sum \n";
