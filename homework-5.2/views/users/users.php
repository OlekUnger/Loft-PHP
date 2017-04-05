<?php
$title = 'Список пользователей';
include_once 'template/blocks/head.php';
?>

<main class="userlist">

    <h1>Запретная зона, доступ только авторизированному пользователю</h1>
    <h2>Информация выводится из базы данных</h2>

    <?php include_once 'template/blocks/table_users.php'; ?>
</main>
<footer></footer>

