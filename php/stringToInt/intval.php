<?php
chdir(__DIR__);
require('../Benchmarker.php');

Benchmarker::executeScript(
function (int $i) {
    $input = "123";

    return intval($input);
}, 1_000_000);