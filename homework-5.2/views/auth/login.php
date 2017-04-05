<?php
$title = 'Регистрация';
include_once 'template/blocks/head.php';

?>

    <main>

        <form method="POST" name="l_form" action="#">
            <?php echo Auth::message(); ?>
            <p>Логин:<br/>
                <input type="text" name="login" placeholder="Логин" value="<?php echo $_POST['login'];?>">
            </p>
            <p>Пароль:<br/>
                <input type="password" name="password" placeholder="Пароль">
            </p>
            <button type="submit" name="enter" value="вход">Вход</button>
        </form>
    </main>
    <footer></footer>
