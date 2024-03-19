<?php
namespace routes;

class Router{
    private string $path;
    private string $controller;
    private string $action;
    public function __construct($path, $actions)
    {
        $this->path = $path;
        $this->controller = $actions[0];
        $this->action = $actions[1];
    }

    public static function post($path, $actions)
    {
        if (!empty($_POST))
        {
            $router = new Router($path, $actions);
            if ($router->matchPath()) {
                return $router->execute();
            }
            
        }
    }
    public static function get($path, $actions)
    {
        if (!empty($_GET))
        {
            $router = new Router($path, $actions);
            if ($router->matchPath()) {
                return $router->execute();
            }

        }
    }

    private function execute(): mixed
    {
        $action = $this->action;
        $obj = new $this->controller();
        $res = $obj->$action();
        return $res;
    }

    private function matchPath() : bool
    {
        if (!empty($_POST)){
            return $_POST['path'] === $this->path;
        }
        else {
            return $_GET['path'] == $this->path;
        }
    }
}