<?php

function palindrom($text)
{
    $arr1 = str_split(trim(mb_strtolower($text)));
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
        echo "Это слово - палиндром";
    } else {
        echo "Это слово - не палиндром";
    }
}

out(palindrom('AbcDCba '));
