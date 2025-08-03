<?php
chdir(__DIR__);
require('../Benchmarker.php');

Benchmarker::executeScript(
function (int $i) {
    $ts = intdiv(1753133704641, 1000);
    $date = DateTime::createFromFormat('U', $ts);
    $date->setTimezone(new DateTimeZone('UTC'));

    return $date->format('Y-m-d\TH:i:s');
}, 100_000);