const Benchmarker = require('../Benchmarker');

Benchmarker.executeScript((i) => {
    const ts = 1753133704641;
    const date = new Date(ts);
    const pad = n => String(n).padStart(2, '0');

    return `${date.getUTCFullYear()}-${pad(date.getUTCMonth()+1)}-${pad(date.getUTCDate())}T${pad(date.getUTCHours())}:${pad(date.getUTCMinutes())}:${pad(date.getUTCSeconds())}`;
}, 100_000);