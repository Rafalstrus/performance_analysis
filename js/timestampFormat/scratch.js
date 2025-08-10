const Benchmarker = require('../Benchmarker');

Benchmarker.executeScript((i) => {
    const ts = 1753133704641;

    const MILLISECONDS_IN_SECOND = 1000;
    const MILLISECONDS_IN_MINUTE = 60 * MILLISECONDS_IN_SECOND;   // 60_000
    const MILLISECONDS_IN_HOUR = 60 * MILLISECONDS_IN_MINUTE;     // 3_600_000
    const MILLISECONDS_IN_DAY = 24 * MILLISECONDS_IN_HOUR;       // 86_400_000

    let days = Math.floor(ts / MILLISECONDS_IN_DAY);
    let rem = ts % MILLISECONDS_IN_DAY;

    let hour = Math.floor(rem / MILLISECONDS_IN_HOUR);
    rem %= MILLISECONDS_IN_HOUR;
    let minute = Math.floor(rem / MILLISECONDS_IN_MINUTE);
    let second_ms_rem = rem % MILLISECONDS_IN_MINUTE;
    let second = Math.floor(second_ms_rem / MILLISECONDS_IN_SECOND);

    let year = 1970;
    const daysInMonth = [31, 28, 31, 30, 31, 30, 31, 31, 30, 31, 30, 31];

    while (true) {
        const leap = (year % 4 === 0 && (year % 100 !== 0 || year % 400 === 0));
        const yearDays = leap ? 366 : 365;

        if (days >= yearDays) {
            days -= yearDays;
            year++;
        } else break;
    }

    if (year % 4 === 0 && (year % 100 !== 0 || year % 400 === 0)) {
        daysInMonth[1] = 29;
    }

    let month = 0;
    while (days >= daysInMonth[month]) {
        days -= daysInMonth[month];
        month++;
    }

    let day = days + 1;

    const pad = n => String(n).padStart(2, '0');

    return `${year}-${pad(month + 1)}-${pad(day)}T${pad(hour)}:${pad(minute)}:${pad(second)}`;
}, 100_000);