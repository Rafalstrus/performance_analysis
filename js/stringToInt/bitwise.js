const Benchmarker = require('../Benchmarker');

Benchmarker.executeScript((i) => {
    const input = "123";

    return input | 0;
}, 1_000_000);