<?php
chdir(__DIR__);
require('../Benchmarker.php');

Benchmarker::executeScript(
function () {
    $input = [1, 1, 1, 2, 3, 2, 4, 5, 6, 7, 8, 5, 6, 9];
    
    $reversed = [];
    
    for ($i = count($input) - 1; $i >= 0; $i--) {
        $reversed[] = $input[$i];
    }

    return $reversed;
}, 1_000_000);
