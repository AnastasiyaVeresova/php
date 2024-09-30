<?php

function validateName(string $name): string
{
    if (!empty(trim($name))) {
        $name = strtolower(trim($name));
        $name = ucfirst($name);
        return $name;
    } else {
        return "Пожалуйста, введите ваше имя.";
    }
}

/*echo "Введите ваше имя: ";
$nameInput = fgets(STDIN);

$result = validateName($nameInput);
echo $result . PHP_EOL;*/
