<?php
chdir(__DIR__);
require('../Benchmarker.php');

Benchmarker::executeScript(
function () {
    $input = [1, 1, 1, 2, 3, 2, 4, 5, 6, 7, 8, 5, 6, 9];
    $output = [];
    
    foreach ($input as $val) {
        if (!isset($output[$val])) {
            $output[$val] = $val;
        }
    }

    return array_values($output);
}, 1_000_000);
