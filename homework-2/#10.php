<?php
$file = fopen('anothertest.txt','w');
$str = 'Hello, again!';
fwrite($file, $str);
fclose($file);

echo file_get_contents('anothertest.txt');