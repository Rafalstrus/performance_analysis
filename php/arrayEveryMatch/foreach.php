<?php
chdir(__DIR__);
require('../Benchmarker.php');

Benchmarker::executeScript(
function () {
    $input = [1, 1, 1, 2, 3, 2, 4, 5, 6, 7, 8, 5, 6, 9];
    
    foreach ($input as $v) {
        if ($v <= 0) return false;
    }

    return true;
}, 1_000_000);
