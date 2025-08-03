<?php
chdir(__DIR__);
require('../Benchmarker.php');

Benchmarker::executeScript(
function (int $i) {
    $str = "  hello world  ";

    return trim($str);
}, 1_000_000);