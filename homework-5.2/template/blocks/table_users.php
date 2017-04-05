<?php

echo "<table class=\"table table-bordered\">";
$table = ['Имя', 'Возраст', 'Описание', 'Фотография'];
foreach ($table as $item) {
    echo "<th>" . $item . "</th>";
}
foreach ($usersList as $userItem) {
    echo "
        <tr>
            <td>{$userItem['name']}</td>
            <td>{$userItem['age']}</td>
            <td>{$userItem['description']}</td>
            <td><div class='user_photo'><img  src=/template/Photos/{$userItem['photo']}></div></td>
            <td><a class='delete-user' href='users/{$userItem['id']}'>Посмотреть</a></td>
        </tr>";

}
echo "</table>";

