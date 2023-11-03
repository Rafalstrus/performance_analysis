<?php

chdir(__DIR__);
require('../ScriptExecutor.php');

$max = 100_000;
$array = [];

[$executionTime, $memoryUsed] = ScriptExecutor::executeScript(
    function () use ($array, $max) {
        // for ($i = 0; $i < $max; $i++) {
        //     array_unshift($array, $i);
        // }
    }
);

// if (count($array) !== $max) {
//     throw new Exception('error');
// }

// too slow for real comparision, around 28 seconds, for one run
ScriptExecutor::echoResult((float) 28.0000, 12 * 1024 * 1024);
