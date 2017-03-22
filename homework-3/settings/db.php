<?php
require_once 'vars.php';
require_once 'funcs.php';

$localhost = 'localhost';
$user = 'root';
$pass = '';
$db = 'db';

$connect = mysqli_connect($localhost, $user, $pass, $db) or die('Ошибка соединения с БД');
mysqli_set_charset($connect, 'UTF8');
// лучше писать так
if ($connect === false) {
    echo mysqli_error();
}
