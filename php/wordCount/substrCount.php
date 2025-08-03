<?php
chdir(__DIR__);
require('../Benchmarker.php');

Benchmarker::executeScript(
function (int $i) {
    $input = 'example count word, example count word, example count word.';
    $search = "count";

    return substr_count($input, $search);
}, 1_000_000);