const Benchmarker = require('../Benchmarker');

Benchmarker.executeScript((i) => {
    const input = [1, 1, 1, 2, 3, 2, 4, 5, 6, 7, 8, 5, 6, 9];

    return input.reduceRight((acc, val) => {
        acc.push(val);
        return acc;
    }, []);
}, 1_000_000);