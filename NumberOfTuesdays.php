<?php

// Задача 2


function calculateTuesdaysCountBetweenTwoDates($startDate, $endDate): int
{
    $start = new DateTime($startDate);
    $end = new DateTime($endDate);

    $count = 0;

    while ($start <= $end) {
        if ($start->format('N') == 2) {
            // 2 is Tuesday's code
            $count++;
        }
        $start->modify('+1 day');
    }

    return $count;
}

// start date should be before end date
$startDate = '2024-02-15';
$endDate = '2024-04-05';
//$endDate = date('Y-m-d'); // if need we can use current date

$tuesdaysCount = calculateTuesdaysCountBetweenTwoDates($startDate, $endDate);

echo "Tuesday's count between $startDate and $endDate: $tuesdaysCount \n";
