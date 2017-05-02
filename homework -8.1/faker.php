<?php
require_once './faker/faker.php';

$messages=Faker::getFaker();

?>

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
                <li class="left"><a href="/" class="">Главная</a></li>
                <li class="right"><a href="faker.php" class="active">Faker</a></li>
                <li class="right"><a href="list.php" class="">Список товаров</a></li>
            </ul>
        </div>
    </header>
    <main class="main">
        <?php if (!empty($messages)) {
            foreach ($messages as $message) {
                echo '<h2>' . $message . '</h2>';
            }
        }
        ?>
        <form action="faker.php" method="POST">
            <button type="submit" name="add">Добавить контент</button>
        </form>
    </main>
</div>

</div>
<footer></footer>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script type="application/javascript" src="template/main.js"></script>
</body>
</html>



