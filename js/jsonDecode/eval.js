const Benchmarker = require('../Benchmarker');

Benchmarker.executeScript((i) => {
    const json = '{"bool": true, "object": {"property": "string"}, "string": "string", "int": 123, "null": null}';

    return eval('(' + json + ')');
}, 1_000_000);