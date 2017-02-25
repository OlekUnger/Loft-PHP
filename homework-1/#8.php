<?php
$str = "one two three";
echo $str.'<br>';

$arr = explode(" ", $str);
print_r($arr);

echo '<br>';

$count = count($arr);
$reversed = array_reverse($arr);
$i = 0;
while ($i< $count) {
    $str2 .= $reversed[$i].",";
    $i++;
}
echo rtrim($str2, ",");
