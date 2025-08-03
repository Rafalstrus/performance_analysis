const Benchmarker = require('../Benchmarker');

Benchmarker.executeScript((i) => {
    const input = 'example count word, example count word, example count word.';
    const search = "count";

    return input.split(' ').filter(part => part === search).length;
}, 1_000_000);