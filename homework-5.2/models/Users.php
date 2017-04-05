<?php

class Users
{
    public static function getUserById($id)
    {
        $id = intval($id);
        if ($id) {
            $connection = Db::getConnection();
            $result = $connection->query('SELECT*FROM users WHERE id=' . $id);
            $userItem = $result->fetch(PDO::FETCH_ASSOC);
            return $userItem;
        } else echo 'no';

    }

    public static function getUsersList()
    {
        $connection = Db::getConnection();
        $usersList = array();
        $result = $connection->query('SELECT*FROM users ORDER BY age DESC');

        $i = 0;
        while ($row = $result->fetch()) {
            $usersList[$i]['id'] = $row['id'];
            $usersList[$i]['age'] = $row['age'];
            if($row['age']>=18) {
                $usersList[$i]['name'] = $row['name'] . '<br>Совершеннолетний';

            }else{
                $usersList[$i]['name'] = $row['name'] . '<br>Несовершеннолетний';
            }

            $usersList[$i]['description'] = $row['description'];
            $usersList[$i]['photo'] = $row['foto'];
            $i++;
        }
        return $usersList;
    }
}