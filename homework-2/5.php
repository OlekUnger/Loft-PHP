<?php

function palindrom($text)
{
    $arr1   = str_split(trim(mb_strtolower($text)));
    $arr2   = array_reverse($arr1);
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
        echo "Это слово - палиндром"; // двойные избыточны
    } else {
        echo "Это слово - не палиндром";
    }
}

out(palindrom('Удавы рвали лавры в аду'));
// это не работает
// Мороз в узел, лезу взором
// И любит Сева вестибюли
// Удавы рвали лавры в аду