const Benchmarker = require('../Benchmarker');

Benchmarker.executeScript((i) => {
    let iterator = 0;

    for (iterator = 0; iterator < 1_000; iterator++) {}
}, 1_000);