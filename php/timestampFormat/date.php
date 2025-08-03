<?php
chdir(__DIR__);
require('../Benchmarker.php');

Benchmarker::executeScript(
function (int $i) {
    $ts = intdiv(1753133704641, 1000);
    
    return date('Y-m-d\TH:i:s', $ts);
}, 100_000);