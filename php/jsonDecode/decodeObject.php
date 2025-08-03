<?php
chdir(__DIR__);
require('../Benchmarker.php');

Benchmarker::executeScript(
function (int $i) {
    $json = '{"bool": true, "object": {"property": "string"}, "string": "string", "int": 123, "null": null}';

    return json_decode($json);
}, 1_000_000);
