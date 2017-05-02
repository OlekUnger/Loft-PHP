<?php

require './connect.php';

if ($_SERVER['REQUEST_METHOD'] == "GET") {
    $data = ProductTable::with('category')->get()->toJson();
    echo $data;
}

////один товар
//
//if ($_SERVER['REQUEST_METHOD'] == "GET") {
//    echo ProductTable::where('id', '=', $_GET['id'])->first();
//}

//удалить товар
if ($_SERVER['REQUEST_METHOD'] == "DELETE") {
    echo ProductTable::find($_GET['id'])->delete();
}

////редактировать или добавить
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $product = ProductTable::find($_GET['id']);
    if($product){
        $product->name = $_POST['name'];
        $product->price = $_POST['price'];
        $product->category_id = $_POST['category'];
        $product->description = $_POST['description'];
        $product->save();
        echo $product->toJson();
    } else{
        $product = new ProductTable();
        $product->name = $_POST['name'];
        $product->category_id = $_POST['category'];
        $product->price = $_POST['price'];
        $product->description = $_POST['description'];
        $product->save();
        echo $product->toJson();
    }
}




