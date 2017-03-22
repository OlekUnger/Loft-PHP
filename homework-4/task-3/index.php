<?php
require_once '../css.php';
error_reporting(-1);
for ($i = 0; $i <= 50; $i++) {
    $arr[$i] = rand(0, 100);
}

$file = fopen('doc.csv', 'w');
fputcsv($file, $arr);
fclose($file);

$file2 = fopen('doc.csv', 'r');

$arr2 = fgetcsv($file2, 100, ',');

$arr2[] = $file2;

foreach ($arr2 as $value) {
    if (gettype($value) === 'string' && $value % 2 == 0) {
        $res[] = $value;
    }
}


?>
<div class='container2'>
    <div class='item'>
        <p>Array</p>
        <hr>
        <?php echo '<pre>';
        print_r($arr); ?>
    </div>
    <div class='item'>
        <p>Even</p>
        <hr>
        <?php echo '<pre>';
        print_r($res); ?>
    </div>
    <div class='item'>
        <p>Summ</p>
        <hr>
        <?php echo '<pre>';
        echo array_sum($res); ?>
    </div>

    <a class='button' href="?do=renew">Обновить массив</a>
</div>
