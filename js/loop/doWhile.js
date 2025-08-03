const Benchmarker = require("../Benchmarker");

Benchmarker.executeScript((i) => {
  let iterator = 0;

  do {
    iterator++;
  } while (iterator < 1_000);
}, 1_000);
