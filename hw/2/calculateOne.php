<!-- Реализовать основные 4 арифметические операции в виде функции с тремя параметрами – два параметра это числа, третий – операция. Обязательно использовать оператор return. -->

<?php

$result = calculate(10, 0, 'divide');
echo $result;
function calculate($arg1, $arg2, $operation) {

    switch ($operation) {

        case 'add':

            return $arg1 + $arg2;

        case 'subtract':

            return $arg1 - $arg2;

        case 'multiply':

            return $arg1 * $arg2;

        case 'divide':

            return $arg2 != 0 ? $arg1 / $arg2 : 'Ошибка деления на ноль';

        default:

            return 'Неизвестная операция';

    }

}

