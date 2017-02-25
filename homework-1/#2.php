<?php

$all_pics = 80;
$flo_pics = 23;
$pencil_pics = 40;
$paint_pics = $all_pics-($flo_pics + $pencil_pics);
echo '<pre>';
echo "\tНа школьной выставке $all_pics рисунков. $flo_pics из них выполнены фломастерами, $pencil_pics карандашами,
        а остальные-красками.
        Сколько рисунков, выполненных красками, на школьной выставке?
        Ответ: карандашами выполнено $paint_pics рисунков";
echo '</pre>';
