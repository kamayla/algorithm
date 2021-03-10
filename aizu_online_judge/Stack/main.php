<?php
$fh = fopen('sample.txt', "r");
$line = explode(' ', trim(fgets($fh)));

$array = [];
foreach ($line as $l) {
    if (is_numeric($l)) {
        $array[] = $l;
    } else {
        $takeValues = array_splice($array, -2, 2);
        switch ($l) {
            case '+':
                $result = $takeValues[0] + $takeValues[1];
                break;
            case '-':
                $result = $takeValues[0] - $takeValues[1];
                break;
            case '*':
                $result = $takeValues[0] * $takeValues[1];
                break;
        }
        $array[] = $result;
    }
}

echo $array[0] . "\n";

