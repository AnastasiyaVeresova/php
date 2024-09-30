<!-- С помощью рекурсии организовать функцию возведения числа в степень. Формат: fupowctiopow power($val, $pow), где $val – заданное число, $pow – степень. -->

<?php

function power($val, $pow) {
  if ($pow == 0) {
    return 1;
  }

  if ($pow < 0) {
    return power (1/$val, -$pow);
  }
  return $val * power ($val, $pow-1);
} 

print_r(power (5, -5));