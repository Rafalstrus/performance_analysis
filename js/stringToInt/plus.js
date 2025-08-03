const Benchmarker = require('../Benchmarker');

Benchmarker.executeScript((i) => {
    const input = "123";

    return +input;
}, 1_000_000);