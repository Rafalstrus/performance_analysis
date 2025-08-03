const Benchmarker = require('../Benchmarker');

Benchmarker.executeScript((i) => {
    const input = [1, 1, 1, 2, 3, 2, 4, 5, 6, 7, 8, 5, 6, 9];

    const output = {};
    
    for (let i of input) {
        if (!output[input[i]]) {
            output[i] = true;
        }
    }

    return Object.keys(output)
}, 1_000_000);