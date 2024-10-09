<!-- Написать функцию, которая вычисляет текущее время и возвращает его в формате с правильными склонениями, например:
22 часа 15 минут
21 час 43 минуты. -->

<?php
function getTimeWithDeclension() {

    $hours = date('G');

    $minutes = date('i');

 

    // Определяем склонения для часов

    $hourDeclension = 'час';

    if ($hours % 10 == 1 && $hours % 100 != 11) {

        $hourDeclension = 'час';

    } elseif (in_array($hours % 10, [2, 3, 4]) && !(in_array($hours % 100, [12, 13, 14]))) {

        $hourDeclension = 'часа';

    } else {

        $hourDeclension = 'часов';

    }

 

    // Определяем склонения для минут

    $minuteDeclension = 'минута';

    if ($minutes % 10 == 1 && $minutes % 100 != 11) {

        $minuteDeclension = 'минута';

    } elseif (in_array($minutes % 10, [2, 3, 4]) && !(in_array($minutes % 100, [12, 13, 14]))) {

        $minuteDeclension = 'минуты';

    } else {

        $minuteDeclension = 'минут';

    }

 

    return "$hours $hourDeclension $minutes $minuteDeclension";

}

 

echo getTimeWithDeclension();