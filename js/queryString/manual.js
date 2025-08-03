const Benchmarker = require('../Benchmarker');

Benchmarker.executeScript((i) => {
    const input = "parameter1=123&parameter2=test";
    const result = {};

    const pairs = input.split('&');

    pairs.forEach(pair => {
        const parts = pair.split('=');
        const key = decodeURIComponent(parts[0]);
        result[key] = decodeURIComponent(parts.slice(1).join('='));
    });

    return result;
}, 1_000_000);