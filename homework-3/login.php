<?php
require_once 'settings/funcs.php';
require_once 'settings/db.php';

session_start();

if (isset($_POST['enter'])) {
    $errors = [];
    if ($login == '') {
        $errors[] = 'Введите логин';
    }
    if ($password == '') {
        $errors[] = 'Введите пароль';
    }
    if (empty($errors)) {
        $query = mysqli_query($connect, "SELECT login,name, password FROM `users` WHERE login='$login' AND  password =SHA('$password')");
        $res = mysqli_fetch_assoc($query);
        if ($res['login'] != $login) {
            message('error', 'Неверный логин или пароль', 'login.php');
        }
        $_SESSION['login'] = $res['login'];
        if(!empty($res['name'])){
            $_SESSION['name']=$res['name'];
            header('Location: index.php');
            exit();
        } else{
            message('success', 'Вход выполнен, заполните форму', 'profile.php');
        }

    } else {
        message('error', array_shift($errors), 'login.php');
    }
}
?>

<?php head('Вход'); ?>
<body>

<div class="wrapper">
    <header>
        <div class='container'>
            <?php menu(); ?>
        </div>
    </header>

    <main>
        <form method="POST" name="l_form" action="<?php echo $_SERVER['PHP_SELF']; ?>">
            <?php if (isset($_SESSION['message'])) echo $_SESSION['message'];
            unset($_SESSION['message']);
            ?>
            <p>Логин:<br/>
                <input type="text" name="login" value="<?php echo $login ?>">
            </p>
            <p>Пароль:<br/>
                <input type="password" name="password">
            </p>
            <button type="submit" name="enter" value="вход">Вход</button>
            <button type="reset">Очистить</button>
        </form>
    </main>
    <footer></footer>
</div>

</body>

</html>
