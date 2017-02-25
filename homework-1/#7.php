<?php

echo "<table border='1'>\n";
for ($row = 1; $row<=10; $row++) {
    echo "\t<tr>\n";
    for ($col = 1; $col<=10; $col++) {
        $result = $row*$col;
        if (($row%2)==0 && ($col%2)==0) {
            echo "\t\t<td>$row*$col = [$result]</td>\n";
        } elseif (($row%2)==1 && ($col%2)==1) {
            echo "\t\t<td>$row*$col=($result)</td>\n";
        } else {
            echo "\t\t<td>$row*$col=$result</td>\n";
        }
    }
    echo "\t</tr>\n";
}
echo "</table>";
