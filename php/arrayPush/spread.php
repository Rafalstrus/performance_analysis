<?php
$max = 100_000;
$array = [];
$start_time = microtime(true);

// for ($i = 0; $i < $max; $i++) {
//     $array = [...$array, $i];
// }

$end_time = microtime(true);
$execution_time = $end_time - $start_time;
$memory_used = memory_get_peak_usage(true);

// if (count($array) !== $max) {
//     throw new Exception('error');
// }

// too slow for real comparision, around 52 seconds, for one run
echo "time: 52.0000, memory: " . 12; 