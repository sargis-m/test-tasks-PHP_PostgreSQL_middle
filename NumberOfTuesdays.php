<?php

// Задача 2

/**
 * Calculate the number of Tuesdays between two given dates.
 *
 * @param string $startDate The start date for the calculation.
 * @param string $endDate The end date for the calculation.
 * @return int The count of Tuesdays between the two dates.
 * @throws Exception
 */
function calculateTuesdaysCountBetweenTwoDates(string $startDate, string $endDate): int
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
// $endDate = date('Y-m-d'); // if need we can use current date

$tuesdaysCount = 0;

try {
    $tuesdaysCount = calculateTuesdaysCountBetweenTwoDates($startDate, $endDate);
} catch (Exception $e) {
    echo 'Error: ' . $e->getMessage() . "\n";
    exit(1);
}

echo "Tuesday's count between $startDate and $endDate: $tuesdaysCount \n";
