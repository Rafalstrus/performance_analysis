<?php

class Benchmarker
{
    public static function executeScript(callable $testedFunction, int $iterations): void
    {
        $start_time = microtime(true);

        for ($i = 0; $i < $iterations; $i++) {
            $testedFunction($i);
        }

        $end_time = microtime(true);

        self::saveResult($end_time - $start_time, memory_get_peak_usage(true));
    }

    public static function saveResult(float|int $executionTime, int $memoryPeak)
    {
        $operationName = basename(dirname($_SERVER['SCRIPT_FILENAME']));
        $resultFile = __DIR__ . '/results/' . $operationName . '.json';

        $resultData = file_exists($resultFile)
            ? json_decode(file_get_contents($resultFile), true)
            : [];

        $resultKey = pathinfo($_SERVER['SCRIPT_FILENAME'], PATHINFO_FILENAME);

        $opcacheStatus = opcache_get_status();
        
        if ($opcacheStatus && isset($opcacheStatus['jit']['enabled']) && $opcacheStatus['jit']['enabled']) {
            $resultKey = 'jit_'. $resultKey;
        };

        if (!isset($resultData[$resultKey])) {
            $resultData[$resultKey] = [];
        }

        $resultData[$resultKey][] = [
            "executionTime" => $executionTime,
            "memoryPeak" => $memoryPeak
        ];

        file_put_contents($resultFile, json_encode($resultData, JSON_PRETTY_PRINT));
    }
}