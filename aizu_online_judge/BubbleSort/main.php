<?php
$fh = fopen('sample.txt', "r");
$n = trim(fgets($fh));
$array = explode(' ', trim(fgets($fh)));
$count = 0;
for ($i = 0; $i < $n; $i++) {
    for ($j = ($n - 1); $j > $i; $j--) {
        if ((int) $array[$j] < (int) $array[$j - 1]) {
            $temp = $array[$j - 1];
            $array[$j - 1] = $array[$j];
            $array[$j] = $temp;
            $count++;
        }
    }
}

foreach ($array as $i => $val) {
    if ($i < count($array) - 1) {
        echo $val . " ";
    } else {
        echo $val;
    }
}
echo "\n";
echo "$count\n";


