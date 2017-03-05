<?php
// тут необходимо исправить так второй параметр он может остутсвовать
function get_param($arg1, $arg2)
{
    if (is_array($arg1)) {
        if (func_get_arg(1) === true) {
            $str = implode($arg1);
            return $str;
        } else {
            foreach ($arg1 as $elem) {
                echo "<p>$elem</p>";
            }
        }
    } else {
        echo 'В первом параметре должен быть массив!';
    }
}
echo get_param(['One-', 'Two-', 'Three!'], false);
