<?php
date_default_timezone_set('Europe/Moscow');
echo date('d.m.Y H:i');
echo '<br>';
//вариант 1:
echo date('d.m.Y H:i:s', 1456261200);
echo '<br>';
//вариант 2:
echo date('d.m.Y H:i:s', mktime(0,0,0,2,24,2016));