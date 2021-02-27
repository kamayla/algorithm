<?php
$fh = fopen('sample.txt', "r");
$n = trim(fgets($fh));

$array = explode(' ', trim(fgets($fh)));

foreach ($array as $i => $val) {
    $j = $i - 1;
    $v = $array[$i]; // 比較対象の値をvに格納

    // ($i-1)から左端まで$vが最小になるまでループする。
    while ($j >= 0 && $array[$j] > $v) {
        /**
         * このループ内部は「$array[$j] > $v」が成立していることから
         * 比較対象の数値「$array[$i]」より左側が大きい状態なので
         * おはじきのように右側「$array[$j + 1]」に数字をずらします。
         */
        $array[$j + 1] = $array[$j];
        // そして、次の比較対象に移るため$jをマイナスします。
        $j--;
    }
    $array[$j + 1] = $v;
    dispArray($array);
}

function dispArray($array)
{
    foreach ($array as $i => $val) {
        if ($i === count($array) - 1) {
            echo $val;
        } else {
            echo $val . " ";
        }
    }
    echo "\n";
}
