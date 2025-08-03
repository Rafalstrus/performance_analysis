const Benchmarker = require('../Benchmarker');

Benchmarker.executeScript((i) => {
    const input = [1, 1, 1, 2, 3, 2, 4, 5, 6, 7, 8, 5, 6, 9];

    const reversed = [];

    for (let i = input.length - 1; i >= 0; i--) {
        reversed.push(input[i]);
    }

    return reversed;
}, 1_000_000);