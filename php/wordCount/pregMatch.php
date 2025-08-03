<?php
chdir(__DIR__);
require('../Benchmarker.php');

Benchmarker::executeScript(
function (int $i) {
    $input = 'example count word, example count word, example count word.';
    $search = "count";

    return preg_match_all('/\b' . $search . '\b/i', $input, $matches);
}, 1_000_000);