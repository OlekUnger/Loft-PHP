<?php
function calc($param1, $param2)
{
    echo "<table border='1'>\n";
    if (!is_integer($param1) || !is_integer($param2)) {
        echo 'В качестве параметров должны быть указаны целые числа';
    } elseif (func_num_args() > 2) {
        echo 'Должно быть два параметра';
    } else {
        for ($row = 1; $row <= $param1; $row++) {
            echo "\t<tr>\n";
            for ($col = 1; $col<=$param2; $col++) {
                $result = $row*$col;
                echo "\t\t<td>$row * $col = $result</td>\n";
            }
        }
    }
    echo "\t</tr>\n";
    echo "</table>";
}

calc(2, 4);
