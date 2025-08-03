const Benchmarker = require('../Benchmarker');

Benchmarker.executeScript((i) => {
    const input = "parameter1=123&parameter2=test";

    const params = new URLSearchParams(input);
    const result = {};
    
    for (const [key, value] of params.entries()) {
        result[key] = value;
    }

    return result;
}, 1_000_000);