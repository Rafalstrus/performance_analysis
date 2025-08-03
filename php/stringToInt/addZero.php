<?php
chdir(__DIR__);
require('../Benchmarker.php');

Benchmarker::executeScript(
function (int $i) {
    $input = "123";

    return $input + 0;
}, 1_000_000);