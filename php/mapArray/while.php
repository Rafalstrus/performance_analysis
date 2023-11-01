<?php
$max = 100_000;
$sum = 0;

$start_time = microtime(true);

$values = range(1, $max); // Create an array with values from 1 to 1,000,000

reset($values); // Ensure the array pointer is at the beginning
while ($value = current($values)) {
    $key = key($values);
    $sum += $values[$key];
    // Do something with $key and $value
    next($values);
}

$end_time = microtime(true);
$execution_time = $end_time - $start_time;
$memory_used = memory_get_peak_usage(true);

if ($sum !== 5_000_050_000){
    throw new Exception('error');
}

echo "time: " . number_format($execution_time, 4) . ", memory: " . $memory_used / 1024 / 1024; 