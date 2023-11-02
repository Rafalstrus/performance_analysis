<?php
$max = 100_000;
$start_time = microtime(true);

$array = new SplFixedArray($max);
for ($i = 0; $i < $max; $i++) {
    $array[$i] = $i;
}

$end_time = microtime(true);
$execution_time = $end_time - $start_time;
$memory_used = memory_get_peak_usage(true);

if (count($array) !== $max) {
    throw new Exception('error');
}

echo "time: " . number_format($execution_time, 4) . ", memory: " . $memory_used / 1024 / 1024; 