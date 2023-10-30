<?php
$data = range(1, 15);

$counter = 0;
$x = 0;

$start_time = microtime(true);
while ($counter < 1000) {
    foreach ($data as $value) {
        if ($value === 1) {
            $x += 1;
        } elseif ($value === 2) {
            $x += 2;
        } elseif ($value === 3) {
            $x += 3;
        } elseif ($value === 4) {
            $x += 4;
        } elseif ($value === 5) {
            $x += 5;
        } elseif ($value === 6) {
            $x += 6;
        } elseif ($value === 7) {
            $x += 7;
        } elseif ($value === 8) {
            $x += 8;
        } elseif ($value === 9) {
            $x += 9;
        } elseif ($value === 10) {
            $x += 10;
        } elseif ($value === 11) {
            $x += 11;
        } elseif ($value === 12) {
            $x += 12;
        } elseif ($value === 13) {
            $x += 13;
        } elseif ($value === 14) {
            $x += 14;
        } elseif ($value === 15) {
            $x += 15;
        }
    }
    
    $counter++;
}

if ($x !== 120_000){
    //throw new Exception('error');
}
$end_time = microtime(true);
$execution_time = $end_time - $start_time;
$memory_used = memory_get_peak_usage(true);

echo "time: " . number_format($execution_time, 4) . ", memory: " . $memory_used / 1024 / 1024; 