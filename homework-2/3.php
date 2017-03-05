<?php

function calculate()
{
    function divide($a, $b)
    {
        return $a/$b;
    }
    $array = func_get_args();
    $operator = array_shift($array);

    foreach ($array as $key => $value) {
        $stringElem = $value . $operator;
        $arrElem[$key] = $stringElem;
        $string = implode($arrElem);
    }
    $statement = substr_replace($string, '=', -1);//заменяю последний символ строки на =
    switch ($operator) {
        case '+':
            $result = array_sum($array);
            break;
        case '*':
            $result = array_product($array);
            break;
        case '-':
            $shift = array_shift($array);
            $result = $shift-array_sum($array);
            break;
        case '/':
            $result = array_reduce($array, 'divide', pow($array[0], 2));
            break;
    }
    $output = $statement.$result;
    return $output;
}
echo calculate('/', 500, 10, 5, 2, 1);
