<?php
chdir(__DIR__);
require('../Benchmarker.php');

Benchmarker::executeScript(
function () {
    $input = [1, 1, 1, 2, 3, 2, 4, 5, 6, 7, 8, 5, 6, 9];
    
    return count(array_filter($input, fn($v) => $v > 0)) === count($input);
}, 1_000_000);
