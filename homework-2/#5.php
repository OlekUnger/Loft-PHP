<?php

function palindrom($text)
{
    $text1 = mb_strtolower(mb_ereg_replace('\W+', '', $text));
    for ($i = 0; $i < mb_strlen($text1); $i++) {
        $arr1[$i] = mb_substr($text1, $i, 1);
    }
    $arr2 = array_reverse($arr1);
    $result = array_diff_assoc($arr1, $arr2);
    if (empty($result)) {
        return true;
    } else {
        return false;
    }
}
function out($arg)
{
    if ($arg==true) {
        echo "Это строка - палиндром";
    } else {
        echo "Это строка - не палиндром";
    }
}

out(palindrom('А роза Упала, На лапу ,азора'));
