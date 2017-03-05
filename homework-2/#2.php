<?php

function calculate($array, $operator)
{
    function divide($a, $b)
    {
        return $a / $b;
    }

    $not_number = (bool)array_filter($array, function ($val) {
        return !is_numeric($val);
    });

    if (is_array($array) == false || $not_number == true) {
        echo 'В $array должен быть массив чисел';
    } else {
        if ($operator == '+' || $operator == '-' || $operator == '*' || $operator == '/') {
            switch ($operator) {
                case '+':
                    $result = array_sum($array);
                    break;
                case '-':
                    $shift = array_shift($array);
                    $result = $shift - array_sum($array);
                    break;
                case '*':
                    $result = array_product($array);
                    break;
                case '/':
                    $result = array_reduce($array, 'divide', pow($array[0], 2));
                    break;
            }
        } else {
            echo 'Введен некорректный оператор. Допустимые значения +, -, *, /';
        }
    }
    return $result;
}

echo calculate([700, 5, '5', 7], '/');
