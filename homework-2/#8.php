<?php
function smile()
{
    echo 'smile';
}

$text = 'Rx packets:950381 errors:0 dropped:0 overruns:0 frame:0 .';
$regex = '/(?<=packets:)[0-9]*/';
$count = implode(preg_match($regex, $text, $arr), $arr);

if(preg_match('/:\)/', $text, $arr2)){
    smile();
} else {
    if ($count > 1000) {
        echo 'Сеть есть';
    } else {
        echo 'Сети нет';
    }
};

