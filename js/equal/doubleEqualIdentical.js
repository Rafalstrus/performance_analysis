const Benchmarker = require('../Benchmarker');

Benchmarker.executeScript((i) => {
    if (i == i) {}
}, 1_000_000);