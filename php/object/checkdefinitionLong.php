<?php
$max = 100_000;
$iterator = 0;

$start_time = microtime(true);

class ExampleClass {
    private $property1;
    private $property2;
    private $property3;
    private $property4;
    private $property5;
    private $property6;
    private $property7;
    private $property8;
    private $property9;
    private $property10;
    private $property11;
    private $property12;
    private $property13;
    private $property14;
    private $property15;
    private $property16;
    private $property17;
    private $property18;
    private $property19;
    private $property20;

    public function getProperty1() {
        return $this->property1;
    }

    public function getProperty2() {
        return $this->property2;
    }

    public function getProperty3() {
        return $this->property3;
    }

    public function getProperty4() {
        return $this->property4;
    }

    public function getProperty5() {
        return $this->property5;
    }

    public function getProperty6() {
        return $this->property6;
    }

    public function getProperty7() {
        return $this->property7;
    }

    public function getProperty8() {
        return $this->property8;
    }

    public function getProperty9() {
        return $this->property9;
    }

    public function getProperty10() {
        return $this->property10;
    }

    public function getProperty11() {
        return $this->property11;
    }

    public function getProperty12() {
        return $this->property12;
    }

    public function getProperty13() {
        return $this->property13;
    }

    public function getProperty14() {
        return $this->property14;
    }

    public function getProperty15() {
        return $this->property15;
    }

    public function getProperty16() {
        return $this->property16;
    }

    public function getProperty17() {
        return $this->property17;
    }
    
    public function getProperty18() {
        return $this->property18;
    }

    public function getProperty19() {
        return $this->property19;
    }

    public function getProperty20() {
        return $this->property20;
    }
}

while ($iterator < $max) {
    $iterator++;
    $x = new ExampleClass();
}
$end_time = microtime(true);
$execution_time = $end_time - $start_time;
$memory_used = memory_get_peak_usage(true);

echo "time: " . number_format($execution_time, 4) . ", memory: " . $memory_used / 1024 / 1024; 