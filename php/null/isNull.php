<?php
$max = 100_000;
$iterator = 0;
$sum = 0;

$start_time = microtime(true);

$x = null;

while ($iterator < $max) {
    if (is_null($x)) {
        $sum++;
    }

    $iterator++;
}

$end_time = microtime(true);
$execution_time = $end_time - $start_time;
$memory_used = memory_get_peak_usage(true);

if ($sum !== $max){
    throw new Exception('error');
}


echo "time: " . number_format($execution_time, 4) . ", memory: " . $memory_used / 1024 / 1024; 