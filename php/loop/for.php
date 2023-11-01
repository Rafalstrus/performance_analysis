<?php
$max = 100_000;
$sum = 0;

$start_time = microtime(true);

for ($i = 0; $i < $max; $i++) {
    $sum += 1;
}

if ($sum !== $max){
    throw new Exception('error');
}

$end_time = microtime(true);
$execution_time = $end_time - $start_time;
$memory_used = memory_get_peak_usage(true);

echo "time: " . number_format($execution_time, 4) . ", memory: " . $memory_used / 1024 / 1024; 