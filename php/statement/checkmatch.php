<?php
$data = range(1, 15);

$counter = 0;
$x = 0;

$start_time = microtime(true);
while ($counter < 1000) {
    foreach ($data as $value) {
        $x += match ($value) {
            1 => 1,
            2 => 2,
            3 => 3,
            4 => 4,
            5 => 5,
            6 => 6,
            7 => 7,
            8 => 8,
            9 => 9,
            10 => 10,
            11 => 11,
            12 => 12,
            13 => 13,
            14 => 14,
            15 => 15,
            default => 0, // Handle other values (if necessary)
        };
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