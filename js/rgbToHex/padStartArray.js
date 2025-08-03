const Benchmarker = require('../Benchmarker');

Benchmarker.executeScript((i) => {
    const r = 128;
    const g = 65;
    const b = 246;

    return '#' + [r, g, b]
        .map(x => x.toString(16).padStart(2, '0'))
        .join('');
}, 1_000_000);