<?php
chdir(__DIR__);
require('../Benchmarker.php');

Benchmarker::executeScript(
function () {
    return preg_match("/volutpat/", "Lorem ipsum dolor sit amet, consectetur adipiscing elit. In dapibus lorem volutpat neque aliquam pulvinar.") === 1; 
}, 1_000_000);
