<?php
require_once '../css.php';
error_reporting(-1);


function encode($path, $arg)
{
    $jsonString = json_encode($arg);
    file_put_contents($path, $jsonString);
}

function decode($path)
{
    $jsonFile = file_get_contents($path);
    $aRR = json_decode($jsonFile, true);
    return $aRR;
}


$arr = [];
$item = [];
for ($i = 0; $i < rand(2, 6); $i++) {
    $arr[$i]=$item;
    for ($j = 0; $j < count($arr); $j++) {
        $item[$j] = rand(1, 40);
    }
}

encode('output.json', $arr);

$arr2 = $arr;
if (count($arr) < 4) {
    $message = count($arr) . ' меньше пяти,добавим еще элементов в массив';

    for ($i = 0; $i < rand(1,3); $i++) {
        for ($j = 0; $j < count($arr); $j++) {
            $item[] = $i;
        }
        array_push($arr2, $item);
    }
} else {
    $message = count($arr) . ' больше трех, не будем добавлять';
}
encode('output2.json', $arr2);

$arr1 = decode('output.json');
$arr2 = decode('output2.json');

function compare($a, $b)
{
    if ($a === $b) {
        return 0;
    }
    return ($a > $b) ? 1 : -1;
}

$result = array_udiff($arr2, $arr1, "compare");

?>

<div class='container2'>
    <div class="random"><?php echo $message; ?></div>
    <div class='item'>
        <p>Array</p>
        <hr>
        <?php echo '<pre>';
        print_r($arr); ?>
    </div>
    <div class='item'>
        <p>Decode output.json</p>
        <hr>
        <?php echo '<pre>';
        print_r($arr1); ?>
    </div>
    <div class='item'>
        <p>Decode output2.json</p>
        <hr>
        <?php echo '<pre>';
        print_r($arr2); ?>
    </div>
    <div class='item'>
        <p>Differents</p>
        <hr>
        <?php echo '<pre>';
        print_r($result); ?>
    </div>
    <a class='button' href="?do=renew">Обновить массив</a>
</div>



