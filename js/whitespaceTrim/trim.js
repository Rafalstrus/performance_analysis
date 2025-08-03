const Benchmarker = require('../Benchmarker');

Benchmarker.executeScript((i) => {
    const str = "  hello world  ";

    return str.trim();
}, 1_000_000);