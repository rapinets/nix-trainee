<?php

namespace App\Core;

class View
{
    public $path;
    protected $route;
    public $layout = 'layout';

    public function __construct($route)
    {
        $this->route = $route;
        $this->path = $route['controller'] . '/' . $route['action'];
        
    }

    public function render($title, $date = [])
    {
        if (file_exists('app/views/' . $this->path . '.php')){
            ob_start();
            require 'app/views/' . $this->path . '.php';
            $content = ob_get_clean();
            
            require 'app/layout/' . $this->layout . '.php';
        } else {
            echo 'don\'t has a view ' . $this->path;
        }
    }
}