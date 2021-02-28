<?php
$fh = fopen('sample.txt', "r");
$n = trim(fgets($fh));
$a = explode(' ', trim(fgets($fh)));
$count = 0;
for ($i = 0; $i < $n - 1; $i++) {
    $minj = $i;
    for ($j = $i; $j < $n; $j++) {
        if ($a[$j] < $a[$minj]) $minj = $j;
    }
    if ($i !== $minj) {
        $temp = $a[$i];
        $a[$i] = $a[$minj];
        $a[$minj] = $temp;
        $count++;
    }
}

foreach ($a as $i => $val) {
    if ($i < count($a) - 1) {
        echo "$val ";
    } else {
        echo "$val";
    }
}
echo "\n$count\n";




