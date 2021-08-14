<?php

namespace App\Core;

use App\Core\View;

class Controller
{
    protected $route;
    protected $view;

    public function __construct($route)
    {
        $this->route = $route;
        $this->view = new View($route);
    }
    
}