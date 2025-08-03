<?php
chdir(__DIR__);
require('../Benchmarker.php');

Benchmarker::executeScript(
function () {
    $input = [1, 1, 1, 2, 3, 2, 4, 5, 6, 7, 8, 5, 6, 9];
    
    return array_values(array_unique($input));
}, 1_000_000);
