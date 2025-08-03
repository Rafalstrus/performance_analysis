<?php
chdir(__DIR__);
require('../Benchmarker.php');

Benchmarker::executeScript(
function (int $i) {
    $iterator = 0;

    while ($iterator < 1_000) {
        $iterator++;
    }
}, 1_000);