<?php
require_once 'settings/funcs.php';
require_once 'settings/db.php';
session_start();

if (isset($_GET['delete'])) {
    $del = (int) $_GET['delete'];
    $path ="Photos/".$id.".jpg";
    $query = mysqli_query($connect, "DELETE  FROM  `users` WHERE id='$del'") or die('error');
    if(file_exists($path)){
        unlink($path);
    }
}

$query = mysqli_query($connect, "SELECT id,login,name,age,description,foto FROM `users`");
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
            $table = ['Пользователь(логин)', 'Имя', 'возраст', 'описание', 'Фотография', 'Действия'];
            foreach ($table as $item) {
                echo "<th>" . $item . "</th>";
            }
            while ($res = mysqli_fetch_array($query)) {
                echo "
                    <tr>
                        <td>" . $res['login'] . "</td>
                        <td>" . $res['name'] . "</td>
                        <td>" . $res['age'] . "</td>
                        <td>" . $res['description'] . "</td>
                        <td><img src='Photos/" . $res['foto'] . "'></td>
                        <td><a class='delete-user' href='users_list.php?delete=" . $res['id'] . "'>Удалить пользователя</a></td>
                    </tr>";
            }
            echo "</table>";
        } else {
            echo 'Авторизуйтесь, чтобы получить доступ к контенту';
        }
        ?>


    </main>
    <footer></footer>
</div>

</body>
</html>