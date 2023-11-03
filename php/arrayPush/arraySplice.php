<?php

chdir(__DIR__);
require('../ScriptExecutor.php');

$max = 100_000;
$array = [];

[$executionTime, $memoryUsed] = ScriptExecutor::executeScript(
    function () use ($array, $max) {
        // for ($i = 0; $i < $max; $i++) {
        //     array_splice($array, $i, 0, $i);
        // }
    }
);

// if (count($array) !== $max) {
//     throw new Exception('error');
// }

ScriptExecutor::echoResult((float) 35.8000, 12 * 1024 * 1024);
