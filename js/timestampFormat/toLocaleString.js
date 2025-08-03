const Benchmarker = require('../Benchmarker');

Benchmarker.executeScript((i) => {
    const ts = 1753133704641;
    
    const date = new Date(ts);
    
    return date.toLocaleString('sv-SE', { timeZone: 'UTC' }).replace(' ', 'T');
}, 100_000);
