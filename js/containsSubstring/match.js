const Benchmarker = require('../Benchmarker');

Benchmarker.executeScript((i) => {
    return "Lorem ipsum dolor sit amet, consectetur adipiscing elit. In dapibus lorem volutpat neque aliquam pulvinar.".match("volutpat") !== null; 
}, 1_000_000);