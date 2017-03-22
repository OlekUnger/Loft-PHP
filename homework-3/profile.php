<?php
require_once 'settings/vars.php';
require_once 'settings/db.php';
require_once 'settings/funcs.php';
session_start();


if (isset($_GET['do']) && $_GET['do'] == 'exit') {
    unset($_SESSION['login']);
    unset($_SESSION['name']);
    unset($_SESSION['id']);
    unset($_SESSION['foto']);
    unset($_SESSION['descr']);
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

    if ($_POST['foto']) {

        if ($_FILES['foto']['type'] != 'image/jpeg' && $_FILES['foto']['type'] != 'image/png' && $_FILES['foto']['type'] != 'image/gif') {
            $errors[] = 'Неверный формат изображения';
        }
        if ($_FILES['foto']['size'] > 400000) {
            $errors[] = 'Размер картинки слишком большой';
        }
    }
    if (empty($errors)) {
        $query = mysqli_query($connect, "SELECT * FROM `users` WHERE login='" . $_SESSION['login'] . "'");
        $res = mysqli_fetch_assoc($query);
        $filename = $res['id'] . '.jpg';
        move_uploaded_file($_FILES['foto']['tmp_name'], 'Photos/' . $filename);
        cutImg('Photos/' . $filename, 'Photos/' . $filename);
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
            $query = mysqli_query($connect, "SELECT * FROM `users` WHERE login='" . $_SESSION['login'] . "'");
            $res = mysqli_fetch_assoc($query);
            $_SESSION['name'] = $res['name'];
            $_SESSION['descr'] = $res['description'];
            $_SESSION['age'] = $res['age'];
            $_SESSION['foto'] = $res['foto'];

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
            <?php if (isset($_SESSION['login'])) {
                echo
                "<form method='POST' name='l_form' action='' enctype='multipart/form-data'>";
                if (isset($_SESSION['message'])) echo $_SESSION['message'];
                unset($_SESSION['message']);
                echo "
                    <p>Имя:<br/>
                    
                    <input type='text' name='name' placeholder='Имя' value='" . $_SESSION['name'] . "'/>
                    </p>
                        О себе:<br/>
                    <p>
                        <textarea type='text' name='descr' id='' rows='5' placeholder='О себе'>" . $_SESSION['descr'] . "</textarea>
                    </p>
                    <div class='bottom  clearfix'>
                        <p class='left'>Фото:<br/>
                            <input class='left' type='file' name='foto'>
                        </p>
                        <p class='right'>Возраст:<br/>
                            <select name='age' size='1'>
                                <option value=''>" . $_SESSION['age'] . "</option>
                                <option value='-'>-</option>";
                                for ($i = 10; $i <= 120; $i++) {
                                    echo "<option value=$i>$i</option>";
                                }
                            echo "</select>
                        </p>
                    </div>
                <button type='submit' name='send' value='вход'>Отправить</button>
                 <button type='reset'>Очистить</button> 
            </form>";

            } else {
                echo 'Зарегистрируйтесь или войдите, чтобы иметь доступ в личный кабинет';
            } ?>
        </main>
        <footer></footer>
    </div>

</body>

