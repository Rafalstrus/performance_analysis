const Benchmarker = require('../Benchmarker');

Benchmarker.executeScript((i) => {
    const ts = 1753133704641;
    const date = new Date(ts);
    const fmt = new Intl.DateTimeFormat('sv-SE', {
        timeZone: 'UTC',
        hour12: false,
        year: 'numeric', month: '2-digit', day: '2-digit',
        hour: '2-digit', minute: '2-digit', second: '2-digit'
    });

    return fmt.format(date).replace(' ', 'T');
}, 100_000);