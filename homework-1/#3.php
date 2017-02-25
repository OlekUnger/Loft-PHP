<?php
define('COUNT', '30');
if (defined('COUNT')) {
    echo "Константа существует".'<br>';
    echo "Ее значение равно ".COUNT;
}
echo '<br>';

define('COUNT', '40');
if (COUNT==30) {
    echo "Значение константы изменить не удалось, оно по прежнему равно ".COUNT;
} else {
    echo "Новое значение константы равно".COUNT;
}
