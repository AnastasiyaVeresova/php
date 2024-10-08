<?php



namespace Geekbrains\Application1;



final class Application

{

    private const APP_NAMESPACE = 'Geekbrains\Application1\Controllers\\';



    private string $controllerName;

    private string $methodName;

    private static array $config;



    public static function config(): array

    {

        return self::$config;
    }



    public function run(): string

    {

        self::$config = parse_ini_file('config.ini', true);



        // Получаем части маршрута из URL

        $routeArray = explode('/', trim($_SERVER['REQUEST_URI'], '/'));

        $controllerName = $routeArray[0] !== '' ? ucfirst($routeArray[0]) : 'Page';

        $this->controllerName = self::APP_NAMESPACE . $controllerName . 'Controller';



        // Проверяем существование контроллера

        if (class_exists($this->controllerName)) {

            $methodName = $routeArray[1] ?? 'index'; // Если метод не указан, по умолчанию index

            $this->methodName = 'action' . ucfirst($methodName);



            // Проверяем существование метода в контроллере

            if (method_exists($this->controllerName, $this->methodName)) {

                $controllerInstance = new $this->controllerName();

                return call_user_func_array([$controllerInstance, $this->methodName], []);
            } else {
                header($_SERVER["SERVER_PROTOCOL"] . " 404 Not Found", true, 404);
                header("Location: /404.html");
                die();
                return "Метод не существует";
            }
        } else {
            // header("HTTP/1.1 404 Not Found");
            header($_SERVER["SERVER_PROTOCOL"] . " 404 Not Found", true, 404);
            header("Location: /404.html");
            die();
            // return "Класс $this->controllerName не существует";
        }
    }



    private function handleNotFound(string $errorMessage): string

    {

        header($_SERVER["SERVER_PROTOCOL"] . " 404 Not Found", true, 404);

        // Здесь можно выбрать, как обрабатывать 404: редирект или вывод страницы

        return (new Render())->renderErrorPage($errorMessage);
    }
}
