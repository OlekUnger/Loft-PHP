<?php
require_once 'settings/funcs.php';
require_once 'settings/db.php';
session_start();
if (isset($_GET['do']) && $_GET['do'] == 'exit') {
    unset($_SESSION['login']);
    unset($_SESSION['name']);
    header('Location: index.php');
    exit();
}

if (isset($_POST['send'])) {
    $errors = [];
    if ($name == '') {
        $query = mysqli_query($connect, "SELECT name FROM `users` WHERE login='" . $_SESSION['login'] . "'");
        $res = mysqli_fetch_assoc($query);
        if (empty($res['name'])) {
            $errors[] = 'Введите имя';
        }
    }
    if ($_FILES['foto']['tmp_name']) {
//        if($_FILES['foto']['type']!='image/jpeg' || $_FILES['foto']['type']!='image/png' || $_FILES['foto']['type']!='image/gif') {
//            $errors[] = 'Неверный формат изображения';
//        }
        if ($_FILES['foto']['size'] > 4000000) {
            $errors[] = 'Размер картинки слишком большой';
        }
    }
    if (empty($errors)) {
        $query = mysqli_query($connect, "SELECT * FROM `users` WHERE login='" . $_SESSION['login'] . "'");
        $res = mysqli_fetch_assoc($query);
        $filename = $res['id'] . '.jpg';
        move_uploaded_file($_FILES['foto']['tmp_name'], 'Photos/' . $filename);
        if ($query) {
            if ($name != '') {
                mysqli_query($connect, "UPDATE `users` SET name='$name' WHERE login='" . $_SESSION['login'] . "'");
            }
            if ($descr != '') {
                mysqli_query($connect, "UPDATE `users` SET description='$descr' WHERE login='" . $_SESSION['login'] . "'");
            }
            if ($age != '') {
                mysqli_query($connect, "UPDATE `users` SET age='$age' WHERE login='" . $_SESSION['login'] . "'");
            }
            mysqli_query($connect, "UPDATE `users` SET foto='$filename' WHERE login='" . $_SESSION['login'] . "'");
            $query = mysqli_query($connect, "SELECT id,name FROM `users` WHERE login='" . $_SESSION['login'] . "'");
            $res = mysqli_fetch_assoc($query);
            $_SESSION['name'] = $res['name'];
            message('success', 'Данные отправлены', 'profile.php');
        } else {
            message('error', 'Загрузка не удалась', 'profile.php');
        }
    } else {
        message('error', array_shift($errors), 'profile.php');
    }
}
?>


<?php head('Личный кабинет'); ?>
<body>

<div class="wrapper">
    <header>
        <div class='container'>
            <?php menu(); ?>
        </div>
    </header>
    <main>
        <form method="POST" name="l_form" action="<?php echo $_SERVER['PHP_SELF']; ?>" enctype="multipart/form-data">
            <?php if (isset($_SESSION['message'])) echo $_SESSION['message'];
            unset($_SESSION['message']);
            ?>
            <p>Имя:<br/>
                <input type="text" name="name" placeholder="Имя"/>
            </p>
            О себе:<br/>
            <p>
                <textarea type="text" name="descr" id="" rows="5" placeholder="О себе"></textarea>
            </p>
            <div class="bottom  clearfix">
                <p class="left">Фото:<br/>
                    <input class="left" type="file" name="foto">
                </p>
                <p class="right">Возраст:<br/>
                    <?php echo '<select name="age" size="1">';
                    echo "<option value=\"0\"></option>";
                    echo "<option value=\"1\">-</option>";
                    for ($i = 2; $i <= 120; $i++) {
                        echo "<option value=$i>$i</option>";
                    }
                    echo '</select>';
                    ?>
                </p>
            </div>
            <button type="submit" name="send" value="вход">Отправить</button>
            <button type="reset">Очистить</button>
        </form>
    </main>
    <footer></footer>
</div>

</body>

</html>