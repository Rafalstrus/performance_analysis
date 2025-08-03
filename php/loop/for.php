<?php
chdir(__DIR__);
require('../Benchmarker.php');

Benchmarker::executeScript(
function (int $i) {
    $iterator = 0;

    for ($iterator = 0; $iterator < 1_000; $iterator++) {}
}, 1_000);