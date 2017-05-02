<?php require_once './connect.php' ?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel='stylesheet' href='template/style.css'>
    <title>Список товаров</title>
</head>
<body>
<div class="wrapper">
    <header>
        <div class='container header'>
            <ul class="clearfix">
                <li class="left"><a href="index.php" class="">Главная</a></li>
                <li class="right"><a href="faker.php" class="">Faker</a></li>
                <li class="right"><a href="list.php" class="active">Список товаров</a></li>
            </ul>
        </div>
    </header>
    <main class="main ">
        <h1>Список товаров из базы данных</h1>
        <div class="list">
            <div class="add_form form">
                <h3>Добавить товар</h3>
                <p><input type="text" name="name" placeholder="Название товара" id="name"/></p>
                <p><input type="text" name="price" placeholder="Цена товара" id="price"/></p>
                <p>Категория:<select name="category" id="category">
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="5">5</option>
                    </select></p>
                <p><textarea type="text" name="description" placeholder="Описание товара" id="description"></textarea>
                </p>
                <button type="submit" id="put">Добавить</button>
            </div>


            <div class="product_table"></div>
            <button type="submit" id="button">Все товары</button>


            <div class="form edit_form">
                <h3>Редактировать товар <span style="color:black" class="id"></span></h3>
                <p><input type="text" name="name" placeholder="Название товара" id="edit_name"/></p>
                <p><input type="text" name="price" placeholder="Цена товара" id="edit_price"/></p>
                <p>Категория:<select name="category_id" id="edit_category">
                        <option value=""></option>
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="5">5</option>
                    </select></p>
                <p><textarea type="text" name="description" placeholder="Описание товара"
                             id="edit_description"></textarea></p>
                <button type="submit" id="edit">Редактировать</button>
            </div>


    </main>
</div>


<footer></footer>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script type="application/javascript" src="template/main.js"></script>
</body>
</html>
