<?php

namespace Geekbrains\Application1\Controllers;

use Geekbrains\Application1\Render;
use Geekbrains\Application1\Models\User;

class UserController {

    public function actionAddUser() {
        return "Тут добавляется юзер";
    }

    public function actionIndex() {
        $users = User::getAllUsersFromStorage();
        
        $render = new Render();

        if(!$users){
            return $render->renderPage(
                'user-empty.twig',
                [
                    'title' => 'Список пользователей в хранилище',
                    'message' => "Список пуст или не найден"
                ]);
        }
        else{
            return $render->renderPage(
                'user-index.twig',
                [
                    'title' => 'Список пользователей в хранилище',
                    'users' => $users
                ]);
        }
    }
    public function actionSave()

    {

        $address = "./storage/birthdays.txt";



        $userName = isset($_GET['name']) ? htmlspecialchars(trim($_GET['name'])) : null;

        $userBirthday = isset($_GET['birthday']) ? htmlspecialchars(trim($_GET['birthday'])) : null;



        if (empty($userName) || empty($userBirthday)) {

            return "Ошибка: Имя и дата рождения не могут быть пустыми.";
        }



        $data = $userName . ", " . $userBirthday . "\r\n";



        if ($fileHandler = fopen($address, 'a')) {

            if (fwrite($fileHandler, $data) !== false) {

                fclose($fileHandler);

                return "Запись добавлена: $data в файл $address";
            } else {

                fclose($fileHandler);

                return "Ошибка: Данные не сохранены.";
            }
        } else {

            return "Ошибка: Не удалось открыть файл $address.";
        }
    }

}