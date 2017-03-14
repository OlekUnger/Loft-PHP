<?php
require_once 'settings/funcs.php';
require_once 'settings/db.php';
session_start();

if (isset($_POST['reg_up'])) {
    $errors = [];
    if ($login == '') {
        $errors[] = 'Введите логин';
    }
    if ($password == '') {
        $errors[] = 'Введите пароль';
    }
    if ($password != $password2) {
        $errors[] = 'Пароли не совпадают';
    }
    if (empty($errors)) {

        $query = mysqli_query($connect, "SELECT * FROM `users` WHERE `login` = '$login'");
        if (mysqli_num_rows($query) == 0) {
            mysqli_query($connect, "INSERT INTO `users` VALUES ('', '$login', SHA('$password2'), '','','','' )");
            message('success', 'Вы успешно зарегистрированы, войдите', 'login.php');
        } else {
            message('error', 'Такой логин существует', 'register.php');
        }
    } else {
        message('error', array_shift($errors), 'register.php');
    }
}
?>

<?php head('Регистрация'); ?>
<body>
<div class="wrapper">
    <header>
        <div class='container '>
            <?php menu(); ?>
        </div>
    </header>

    <main>

        <form method="POST" name="r_form" action="<?php echo $_SERVER['PHP_SELF']; ?> ">
            <?php if (isset($_SESSION['message'])) echo $_SESSION['message'];
            unset($_SESSION['message']);
            ?>
            <p>Логин:<br/>
                <input type="text" name="login" placeholder="логин"/>

            </p>
            <p>Пароль:<br/>
                <input type="password" name="password" placeholder="пароль"/>

            </p>
            <p>Пароль(повтор):<br/>
                <input type="password" name="password2" placeholder="пароль"/>

            </p>

            <button type="submit" name="reg_up">Регистрация</button>
            <button type="reset">Очистить</button>
        </form>
    </main>
    <footer></footer>

</body>
</html>
