const Benchmarker = require('../Benchmarker');

Benchmarker.executeScript((i) => {
    const string1 = "hello";
    const string2 = "word";
    
    return String.raw`${string1}${string2}`;
}, 1_000_000);