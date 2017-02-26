<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
        <?php
        $bmw = ['model'=>'X5', 'speed'=>120, 'doors'=>5, 'year'=>2000]; // старайся между ключами и значениями ставить пробел
        // иначе не читается 
        $toyota = ['model' => 'M25', 'speed' => 140, 'doors' => 4, 'year' => 2010];
        $opel = ['model'=>'A50', 'speed'=>160, 'doors'=>2, 'year'=>2015];

        $cars = ['bmw'=> $bmw,'toyota'=> $toyota,'opel'=> $opel];

        foreach ($cars as $car => $name) {
            echo '<div style="border: 1px solid black; width: 300px; padding: 10px">';
            echo "CAR $car".'<br>';

            foreach ($name as $key => $param) {
                echo $param.' ';
            }
            echo '</div>';
            echo '<br>';
        }
        ?>
</body>
</html>

