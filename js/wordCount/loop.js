const Benchmarker = require('../Benchmarker');

Benchmarker.executeScript((i) => {
    const input = 'example count word, example count word, example count word.';
    const search = "count";

    let count = 0;

    for (const part of input.split(' ')) {
        if (part === search) count++;
    }
    
    return count;
}, 1_000_000);