<?php
$data = range(1, 15);

$counter = 0;
$x = 0;

$start_time = microtime(true);
while ($counter < 1000) {
    foreach ($data as $value) {
        switch ($value) {
            case 1:
                $x += 1;
                break;
            case 2:
                $x += 2;
                break;
            case 3:
                $x += 3;
                break;
            case 4:
                $x += 4;
                break;
            case 5:
                $x += 5;
                break;
            case 6:
                $x += 6;
                break;
            case 7:
                $x += 7;
                break;
            case 8:
                $x += 8;
                break;
            case 9:
                $x += 9;
                break;
            case 10:
                $x += 10;
                break;
            case 11:
                $x += 11;
                break;
            case 12:
                $x += 12;
                break;
            case 13:
                $x += 13;
                break;
            case 14:
                $x += 14;
                break;
            case 15:
                $x += 15;
                break;
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