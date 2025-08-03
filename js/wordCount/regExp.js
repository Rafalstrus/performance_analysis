const Benchmarker = require('../Benchmarker');

Benchmarker.executeScript((i) => {
    const input = 'example count word, example count word, example count word.';
    const search = "count";

    const matches = input.match(new RegExp(`\\b${search}\\b`, 'gi'));

    return matches ? matches.length : 0;
}, 1_000_000);