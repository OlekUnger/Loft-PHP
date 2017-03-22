<?php
require_once 'settings/vars.php';
require_once 'settings/funcs.php';

session_start();
if (isset($_GET['do']) && $_GET['do'] == 'exit') {
    unset($_SESSION['login']);
    unset($_SESSION['name']);
    header('Location: index.php');
    exit();
}
?>

<? head('Главная страница'); ?>

<body>
<div class="wrapper">
    <header>
        <div class='container'>
            <ul>
                <?php menu(); ?>
            </ul>

        </div>
    </header>

    <main>
        <h1>Домашнее задание по PHP № 3</h1>
    </main>
    <footer></footer>
</div>

</body>

