<?php

function findBirthdaysToday($file)
{
    $today = date('d-m');
    $fileContent = file($file);
    $birthdays = [];

    foreach ($fileContent as $line) {
        list($name, $date) = explode(',', trim($line));
        $date = trim($date);

        if (substr($date, 0, 5) === $today) {
            $birthdays[] = $name;
        }
    }

    if (!empty($birthdays)) {
        echo "Сегодня день рождения у: " . implode(", ", $birthdays) . "\n";
    } else {
        echo "Сегодня никого нет с днем рождения.\n";
    }
}
