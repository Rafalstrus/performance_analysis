<?php

$patternTime = '/time: (\d+\.\d+) seconds/';
$patternMemory = '/memory: (\d+\.\d+) MB/';

// statement();
objectchecker();
// loop();

function objectchecker()
{
    $arrayOfObjects = ['definitionShort', 'definitionLong'];

    foreach ($arrayOfObjects as $object) {
        $counter = 0;
        $executionTime = 0;
        $memoryUsed = 0;

        while ($counter < 100) {
            [$time, $mem] = runsScript('object', $object);
            $executionTime += $time;
            $memoryUsed += $mem;
            $counter++;
        }
        saveResult('object', $object, $executionTime, $memoryUsed);
    }
}

function loop()
{
    $arrayOfLoops = ['doWhile', 'for', 'foreEach', 'while'];

    foreach ($arrayOfLoops as $loop) {
        $counter = 0;
        $executionTime = 0;
        $memoryUsed = 0;

        while ($counter < 100) {
            [$time, $mem] = runsScript('loop', $loop);
            $executionTime += $time;
            $memoryUsed += $mem;
            $counter++;
        }
        saveResult('loop', $loop, $executionTime, $memoryUsed);
    }
}

function statement()
{
    $arrayOfStatements = ['hashArray', 'if', 'ifelse', 'ifIdentical', 'match', 'switch'];

    foreach ($arrayOfStatements as $statement) {
        $counter = 0;
        $executionTime = 0;
        $memoryUsed = 0;

        while ($counter < 100) {
            echo $counter;
            [$time, $mem] = runsScript('statement', $statement);
            $executionTime += $time;
            $memoryUsed += $mem;
            $counter++;
        }
        saveResult('statement', $statement, $executionTime, $memoryUsed);
    }
}

function runsScript($path, $script)
{
    $result = shell_exec("php " . $path . '/check' . $script . '.php');
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

function saveResult($path, $script, $time, $memory) {
    file_put_contents('result/' . $path . '/' . $script . '.txt', 't: ' . $time . ', m: ' . $memory . PHP_EOL, FILE_APPEND);
}
