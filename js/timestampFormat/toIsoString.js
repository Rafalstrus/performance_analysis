const Benchmarker = require('../Benchmarker');

Benchmarker.executeScript((i) => {
    const ts = 1753133704641;
    
    return iso = new Date(ts).toISOString().split('.')[0];
}, 100_000);