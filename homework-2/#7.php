<?php
//вариант1
echo preg_replace('/К/', '', 'Карл у Клары украл Кораллы');
echo '<br>';
echo preg_replace('/Две/', 'Три', 'Две бутылки лимонада');
echo '<br>';
//вариант2
echo str_replace('К', '', 'Карл у Клары украл Кораллы');
echo '<br>';
echo str_replace('Две', 'Три', 'Две бутылки лимонада');