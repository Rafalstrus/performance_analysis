const Benchmarker = require('../Benchmarker');

Benchmarker.executeScript((i) => {
    return /volutpat/.test("Lorem ipsum dolor sit amet, consectetur adipiscing elit. In dapibus lorem volutpat neque aliquam pulvinar."); 
}, 1_000_000);