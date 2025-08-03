const Benchmarker = require('../Benchmarker');

Benchmarker.executeScript((i) => {
    const input = "123";

    return parseInt(input, 10);
}, 1_000_000);