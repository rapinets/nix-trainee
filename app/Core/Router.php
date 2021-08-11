<?php

namespace App\Core;

use App\Routes\Web;

class Router
{
    protected $routes = [];
    protected $params = [];

    public function __construct()
    {
        $arr = require 'app\routes\web.php';
        foreach($arr as $key => $val){
            $this->add($key, $val);
        }
    }
    
    public function add($route, $params)
    {
        $route = '#^' . $route . '$#';
        $this->routes[$route] = $params;
    }

    public function match()
    {
        $url = trim($_SERVER['REQUEST_URI'], '/');
        foreach($this->routes as $route => $params){
            if(preg_match($route, $url, $matches)){
                $this->params = $params;
                return true;
            }
        }
        return false;
    }

    public function start()
    {
        if($this->match()){
            $path = 'App\Controllers\\' . ucfirst($this->params['controller']) . 'Controller';
            if(class_exists($path)){
                $action = $this->params['action'] . 'Action';
                if(method_exists($path, $action)){
                    $controller = new $path;
                    $controller->$action();
                } else {
                    echo 'not found' . $action;
                }
            } else {
                echo 'not found' . $path;
            }
        }
    }

}