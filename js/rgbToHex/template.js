const Benchmarker = require('../Benchmarker');

Benchmarker.executeScript((i) => {
    const r = 128;
    const g = 65;
    const b = 246;

    return '#' + r.toString(16).padStart(2, '0') +
        g.toString(16).padStart(2, '0') +
        b.toString(16).padStart(2, '0');
}, 1_000_000);