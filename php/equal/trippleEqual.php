<?php
chdir(__DIR__);
require('../Benchmarker.php');

Benchmarker::executeScript(
function (int $i) {
        if ($i === -1) {}
}, 1_000_000);
