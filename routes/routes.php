<?php

use app\controllers\AdminController;
use app\controllers\AuthController;
use routes\Router;
include_once dirname(__FILE__) . '/Router.php';
include_once dirname(__FILE__, 2) . '/app/controllers/AdminController.php';
include_once dirname(__FILE__, 2) . '/app/controllers/AuthController.php';
require_once dirname(__FILE__, 2) . '/vendor/autoload.php';


$routes = [
    ['method' => 'post', 'path' => '/login', 'actions' => [AuthController::class, 'login']],
    ['method' => 'post', 'path' => '/register', 'actions' => [AuthController::class, 'register']],
];



function handleResponse($routes): void
{
    $res = null;
    foreach ($routes as $route) {
        if ($route['method'] == 'post') {
            $res = Router::post($route['path'], $route['actions']);
            if ($res) {
                echo $res;
                break;
            }
        } else if ($route['method'] == 'get') {
            $res = Router::get($route['path'], $route['actions']);
            if ($res) {
                echo $res;
                break;
            }
        }
    }
}

handleResponse($routes);
