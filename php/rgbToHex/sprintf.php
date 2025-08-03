<?php
chdir(__DIR__);
require('../Benchmarker.php');

Benchmarker::executeScript(
function (int $i) {
    $r = 128;
    $g = 65;
    $b = 246;

    return sprintf("#%02x%02x%02x", $r, $g, $b);
}, 1_000_000);