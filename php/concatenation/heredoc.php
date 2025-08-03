<?php
chdir(__DIR__);
require('../Benchmarker.php');

Benchmarker::executeScript(
function () {
    $string1 = "hello";
    $string2 = "word";
    
    return <<<TEXT
    $string1$string2
    TEXT;
}, 1_000_000);
