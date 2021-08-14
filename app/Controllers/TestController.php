<?php

namespace App\Controllers;

use App\Core\Controller;
use App\Core\View;

class TestController extends Controller
{
    public function indexAction()
    {
        //$this->view->path = 'test/index';
        $this->view->render('Test');
    }
}