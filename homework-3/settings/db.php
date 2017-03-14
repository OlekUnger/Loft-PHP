<?php
require_once 'funcs.php';

$name = clearInput($_POST['name']);
$descr = clearInput($_POST['descr']);
$login = clearInput($_POST['login']);
$password = clearInput($_POST['password']);
$password2 = clearInput($_POST['password2']);
$foto = $_FILES['foto'];
$age = $_POST['age'];


$localhost = 'localhost';
$user = 'root';
$pass = '';
$db = 'db';

$connect = mysqli_connect($localhost, $user, '', $db) or die('Ошибка соединения с БД');
mysqli_set_charset($connect, 'UTF8');
if (!$connect) {
    echo mysqli_error();
}
