const Benchmarker = require('../Benchmarker');

Benchmarker.executeScript((i) => {
    const input = "123";

    return Number(input);
}, 1_000_000);