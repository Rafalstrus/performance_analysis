<?php
chdir(__DIR__);
require('../Benchmarker.php');

Benchmarker::executeScript(
function (int $i) {
    $ts = intdiv(1753133704641, 1000);
    $parts = getdate($ts);
    
    return sprintf('%04d-%02d-%02dT%02d:%02d:%02d',
        $parts['year'], $parts['mon'], $parts['mday'],
        $parts['hours'], $parts['minutes'], $parts['seconds']
    );
}, 100_000);