<?php
$max = 100_000;
$iterator = 0;
$start_time = microtime(true);

$counter = 0;

class ExampleClass {
    private $property1;

    public function getProperty1() {
        return $this->property1;
    }
}

$x = new ExampleClass();

while ($iterator < $max) {
    if ($x instanceof ExampleClass) {
        $counter++;
    }

    $iterator++;
}

$end_time = microtime(true);
$execution_time = $end_time - $start_time;
$memory_used = memory_get_peak_usage(true);

echo "time: " . number_format($execution_time, 4) . ", memory: " . $memory_used / 1024 / 1024; 