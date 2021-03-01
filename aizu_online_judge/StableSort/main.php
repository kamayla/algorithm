<?php
$fh = fopen('sample.txt', "r");
$n = trim(fgets($fh));
$a = explode(' ', trim(fgets($fh)));

$ao = [];
foreach ($a as $val) {
    $ao[] = [
        'mark' => substr($val, 0, 1),
        'num' => substr($val, 1, 1),
    ];
}

$bSort = bubbleSort($ao, $n);
$sSort = selectionSort($ao, $n);

$bStr = arrayToString($bSort);
$sStr = arrayToString($sSort);

echo $bStr. "\n";
echo "Stable\n";
echo $sStr. "\n";
echo $bStr === $sStr ? "Stable\n" : "Not stable\n";

function selectionSort($a, $n)
{
    for ($i = 0; $i < $n; $i ++) {
        $minJ = $i;
        for ($j = $i; $j < $n; $j++) {
            if ($a[$j]['num'] < $a[$minJ]['num']) $minJ = $j;
        }
        if ($i !== $j) {
            $temp = $a[$i];
            $a[$i] = $a[$minJ];
            $a[$minJ] = $temp;
        }
    }
    return $a;
}



function bubbleSort($a, $n)
{
    for ($i = 0; $i < $n; $i++) {
        for ($j = $n - 1; $j > $i; $j--) {
            if ($a[$j]['num'] < $a[$j-1]['num']) {
                $temp = $a[$j-1];
                $a[$j-1] = $a[$j];
                $a[$j] = $temp;
            }
        }
    }

    return $a;
}

function arrayToString($a)
{
    $str = '';
    foreach ($a as $i => $val) {
        if ($i < count($a) - 1) {
            $str .= $val['mark'] . $val['num']. ' ';
        } else {
            $str .= $val['mark'] . $val['num'];
        }
    }
    return $str;
}



