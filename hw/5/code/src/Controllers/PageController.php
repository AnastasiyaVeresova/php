<?php

namespace Geekbrains\Application1\Controllers;

use Geekbrains\Application1\Application;
use Geekbrains\Application1\Render;
use Twig\Error\LoaderError;
use Twig\Error\RuntimeError;
use Twig\Error\SyntaxError;

class PageController
{

    public function actionIndex()
    {
        $render = new Render();
        echo Application::config()['storage']['address'];
        return $render->renderPage('page-index.twig', ['title' => 'Главная страница', 'time' => date("Y-m-d H:i:s")]);
    }
}