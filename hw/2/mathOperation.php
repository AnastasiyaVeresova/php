<!-- Реализовать функцию с тремя параметрами: function mathOperation($arg1, $arg2, $operation), где $arg1, $arg2 – значения аргументов, $operation – строка с названием операции.
 В зависимости от переданного значения операции выполнить одну из арифметических операций (использовать функции из пункта 3)
 и вернуть полученное значение (использовать switch). -->

<?php

$result = mathOperation(10, 0, 'divide');
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
function mathOperation($arg1, $arg2, $operation){
    return calculate($arg1, $arg2, $operation);
}