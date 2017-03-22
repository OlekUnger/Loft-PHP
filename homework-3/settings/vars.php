<?php

function clearInput($param)
{
    return preg_replace('/[<>]/', '', ($param));
}

$name = clearInput($_POST['name']);
$descr = clearInput($_POST['descr']);
$login = clearInput($_POST['login']);
$password = clearInput($_POST['password']);
$password2 = clearInput($_POST['password2']);
$foto = $_FILES['foto'];
$age = $_POST['age'];
