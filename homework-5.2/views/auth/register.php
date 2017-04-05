<?php
$title = 'Регистрация';
include_once 'template/blocks/head.php';
?>
    <main>

        <form method="POST" name="r_form" action="#">
            <?php echo Auth::message('register');?>
            <p>Логин:<br/>
                <input type="text" name="login" placeholder="логин" value="<?php echo $_POST['login'];?>"/>
            </p>
            <p>Пароль:<br/>
                <input type="password" name="password" placeholder="пароль" value="<?php echo $_POST['password'];?>"/>
            </p>
            <p>Пароль(повтор):<br/>
                <input type="password" name="password2" placeholder="пароль"/>
            </p>
            <button type="submit" name="reg_up">Регистрация</button>
        </form>
    </main>
    <footer></footer>
