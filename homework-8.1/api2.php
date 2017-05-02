<?php
require './connect.php';
//один товар

if ($_SERVER['REQUEST_METHOD'] == "GET") {
    echo ProductTable::where('id', '=', $_GET['id'])->first();
}