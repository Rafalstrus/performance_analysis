<?php

chdir(__DIR__);
require('../ScriptExecutor.php');

$max = 100_000;
$array = new SplFixedArray($max);

[$executionTime, $memoryUsed] = ScriptExecutor::executeScript(
    function () use ($array, $max) {
        for ($i = 0; $i < $max; $i++) {
            $array[$i] = $i;
        }
    }
);


if (count($array) !== $max) {
    throw new Exception('error');
}

ScriptExecutor::echoResult($executionTime, $memoryUsed);
