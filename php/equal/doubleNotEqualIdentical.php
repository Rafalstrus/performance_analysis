<?php
chdir(__DIR__);
require('../Benchmarker.php');

Benchmarker::executeScript(
function (int $i) {
        if ($i != $i) {}
}, 1_000_000);
