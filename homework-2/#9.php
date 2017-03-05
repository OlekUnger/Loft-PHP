<?php
function read_file($file)
{
    if (file_exists($file)) {
        echo file_get_contents($file);
    } else {
        echo "Такого файла не существует";
    }
}

read_file('test.txt');
