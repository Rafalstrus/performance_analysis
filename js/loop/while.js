const Benchmarker = require('../Benchmarker');

Benchmarker.executeScript((i) => {
    let iterator = 0;

    while (iterator < 1_000) {
        iterator++
    }
}, 1_000);