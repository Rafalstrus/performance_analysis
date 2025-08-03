<?php
chdir(__DIR__);
require('../Benchmarker.php');

Benchmarker::executeScript(
function () {
    return str_contains("Lorem ipsum dolor sit amet, consectetur adipiscing elit. In dapibus lorem volutpat neque aliquam pulvinar.", "volutpat"); 
}, 1_000_000);
