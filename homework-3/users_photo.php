<?php
require_once 'settings/db.php';
require_once 'settings/funcs.php';

session_start();
if(isset($_GET['delete'])){
    $id = (int)$_GET['delete'];
    $path ="Photos/".$id.".jpg";
    if(file_exists($path)){
        unlink($path);
    }
    unset($_SESSION['foto']);
    mysqli_query($connect, "UPDATE `users` SET foto='$foto' WHERE id=$id");
    header('Location: users_photo.php');
    exit();
}

$query = mysqli_query($connect, "SELECT * FROM `users`");
?>

<? head('Список пользователей'); ?>

<body>
<div class="wrapper">
    <header>
        <div class='container'>
            <?php menu(); ?>
        </div>
    </header>

    <main class="userlist">

        <h1>Запретная зона, доступ только авторизированному пользователю</h1>
        <h2>Информация выводится из базы данных</h2>
        <?php if (isset($_SESSION['login'])) {
            echo "<table class=\"table table-bordered\">";
            $table = ['Название файла',  'Фотография', 'Действия'];
            foreach ($table as $item) {
                echo "<th>" . $item . "</th>";
            }
            while ($res = mysqli_fetch_array($query)) {
                echo "
                    <tr>
                        <td>" . $res['foto'] . "</td>
                        <td><div class='user_photo'><img  src='Photos/" . $res['foto'] . "'></div></td>
                        <td><a class='delete-user' href='users_photo.php?delete=" . $res['id'] . "'>Удалить аватарку пользователя</a></td>
                    </tr>";
            }
            echo "</table>";
        } else{
            echo 'Авторизуйтесь, чтобы получить доступ к контенту';
        }
        ?>

    </main>
    <footer></footer>
</div>

</body>
