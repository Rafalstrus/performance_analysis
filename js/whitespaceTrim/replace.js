const Benchmarker = require('../Benchmarker');

Benchmarker.executeScript((i) => {
    const str = "  hello world  ";

    return str.replace(/^\s+|\s+$/g, '');
}, 1_000_000);