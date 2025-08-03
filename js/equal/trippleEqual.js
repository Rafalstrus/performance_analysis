const Benchmarker = require('../Benchmarker');

Benchmarker.executeScript((i) => {
    if (i === -1) {}
}, 1_000_000);