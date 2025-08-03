const Benchmarker = require('../Benchmarker');

Benchmarker.executeScript((i) => {
    const input = [1, 1, 1, 2, 3, 2, 4, 5, 6, 7, 8, 5, 6, 9];

    for (let v of input)
        if (v <= 0) {
            return false
        }
    
    return true 
}, 1_000_000);