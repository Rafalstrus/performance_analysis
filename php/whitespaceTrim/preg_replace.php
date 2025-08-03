<?php
chdir(__DIR__);
require('../Benchmarker.php');

Benchmarker::executeScript(
function (int $i) {
    $str = "  hello world  ";

    return preg_replace('/^\s+|\s+$/u', '', $str);
}, 1_000_000);