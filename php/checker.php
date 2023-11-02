<?php

namespace Checker;

class Checker
{
    const NUMBER_OF_REPETITIONS = 100;
    const JIT_ENABLED = true;

    public static function check(string $path): void
    {
        foreach (new \DirectoryIterator(__DIR__ . '/' . $path) as $fileInfo) {
            if (!$fileInfo->isDot() && !$fileInfo->isDir()) {
                if ($fileInfo->getExtension() === 'php') {
                    $counter = 0;
                    $executionTime = 0;
                    $memoryUsed = 0;

                    $name = $fileInfo->getBasename('.' . $fileInfo->getExtension());

                    while ($counter < self::NUMBER_OF_REPETITIONS) {
                        [$time, $mem] = self::runsScript($path, $name);

                        $executionTime += $time;
                        $memoryUsed += $mem;
                        $counter++;
                    }
                    self::saveResult($path, $name, $executionTime, $memoryUsed);
                }
            }
        }
    }

    private static function runsScript($path, $script): array
    {
        $result = shell_exec("php " . __DIR__ . '/' . $path . '/' . $script . '.php');
        echo $result;
        $patternTime = '/time: (\d+\.\d+)/';
        $patternMemory = '/memory:\s*([\d.]+)\s*/';

        // Initialize variables for time and memory
        $executionTime = 0;
        $memoryUsed = 0;
        // Use regular expressions to extract time and memory values
        if (preg_match($patternTime, $result, $matchesTime)) {
            $executionTime = (float)$matchesTime[1];
        }

        if (preg_match($patternMemory, $result, $matchesMemory)) {
            $memoryUsed = (float)$matchesMemory[1];
        }

        return [$executionTime, $memoryUsed];
    }

    private static function saveResult($path, $script, $time, $memory): void
    {
        if (self::JIT_ENABLED) {
            file_put_contents(__DIR__ . '/jit_result/' . $path . '/' . $script . '.txt', 't: ' . $time . ', m: ' . $memory . PHP_EOL, FILE_APPEND);
        } else {
            file_put_contents(__DIR__ . '/result/' . $path . '/' . $script . '.txt', 't: ' . $time . ', m: ' . $memory . PHP_EOL, FILE_APPEND);
        }
    }
}

Checker::check('arrayPush');
Checker::check('instance');
Checker::check('loop');
Checker::check('mapArray');
Checker::check('null');
Checker::check('object');
Checker::check('statement');