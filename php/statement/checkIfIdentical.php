<?php
$data = range(1, 15);

$counter = 0;
$x = 0;

$start_time = microtime(true);
while ($counter < 1000) {
    foreach ($data as $value) {
        if ($value === 1) {
            $x += 1;
        }
        if ($value === 2) {
            $x += 2;
        }
        if ($value === 3) {
            $x += 3;
        }
        if ($value === 4) {
            $x += 4;
        }
        if ($value === 5) {
            $x += 5;
        }
        if ($value === 6) {
            $x += 6;
        }
        if ($value === 7) {
            $x += 7;
        }
        if ($value === 8) {
            $x += 8;
        }
        if ($value === 9) {
            $x += 9;
        }
        if ($value === 10) {
            $x += 10;
        }
        if ($value === 11) {
            $x += 11;
        }
        if ($value === 12) {
            $x += 12;
        }
        if ($value === 13) {
            $x += 13;
        }
        if ($value === 14) {
            $x += 14;
        }
        if ($value === 15) {
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