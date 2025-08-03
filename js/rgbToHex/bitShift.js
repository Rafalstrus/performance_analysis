const Benchmarker = require('../Benchmarker');

Benchmarker.executeScript((i) => {
    const r = 128;
    const g = 65;
    const b = 246;

    return '#' + ((1 << 24) + (r << 16) + (g << 8) + b)
        .toString(16)
        .slice(1);
}, 1_000_000);