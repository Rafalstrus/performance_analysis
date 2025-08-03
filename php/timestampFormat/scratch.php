<?php
chdir(__DIR__);
require('../Benchmarker.php');

Benchmarker::executeScript(
function (int $i) {
    $ts = intdiv(1753133704641, 1000);
    
        $secondsInDay = 86400;
    $days = intdiv($ts, $secondsInDay);
    $rem = $ts % $secondsInDay;

    $hour = intdiv($rem, 3600);
    $rem %= 3600;
    $minute = intdiv($rem, 60);
    $second = $rem % 60;

    $year = 1970;
    $month = 1;

    $daysInMonth = [31,28,31,30,31,30,31,31,30,31,30,31];

    while (true) {
        $leap = ($year % 4 == 0 && ($year % 100 != 0 || $year % 400 == 0));
        $yearDays = $leap ? 366 : 365;

        if ($days >= $yearDays) {
            $days -= $yearDays;
            $year++;
        } else break;
    }

    if ($leap) $daysInMonth[1] = 29;

    while ($days >= $daysInMonth[$month - 1]) {
        $days -= $daysInMonth[$month - 1];
        $month++;
    }

    $day = $days + 1;

    return sprintf('%04d-%02d-%02dT%02d:%02d:%02d', $year, $month, $day, $hour, $minute, $second);
}, 100_000);