<?php

// подключение файлов логики
// require_once('src/main.function.php');
// require_once('src/template.function.php');
// require_once('src/file.function.php');

require_onc __DIR__ . '/vendor/autoload.php';

// вызов корневой функции
$result = main("config.ini");
// вывод результата
fclose($fileHandler);
echo $result;
