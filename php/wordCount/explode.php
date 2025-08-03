<?php
chdir(__DIR__);
require('../Benchmarker.php');

Benchmarker::executeScript(
function (int $i) {
    $input = 'example count word, example count word, example count word.';
    $search = "count";

    $count = 0;

    foreach (explode(' ', $input) as $part) {
        if ($part === $search) $count++;
    }
    
    return $count;
}, 1_000_000);