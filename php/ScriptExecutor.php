<?php

class ScriptExecutor
{
    public static function executeScript($testedFunction): array
    {
        $start_time = microtime(true);

        $testedFunction();

        $end_time = microtime(true);
        return [$end_time - $start_time, memory_get_peak_usage(true)];
    }

    public static function echoResult(float|int $executionTime, int $memoryUsed)
    {
        echo "time: " . number_format($executionTime, 4) . ", memory: " . $memoryUsed / 1024 / 1024; 
    }
}