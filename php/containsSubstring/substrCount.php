<?php
chdir(__DIR__);
require('../Benchmarker.php');

Benchmarker::executeScript(
function () {
    return substr_count("Lorem ipsum dolor sit amet, consectetur adipiscing elit. In dapibus lorem volutpat neque aliquam pulvinar.", "volutpat") > 0; 
}, 1_000_000);
