<?php

namespace App\Controllers;

use App\Core\Controller;
use App\Core\View;

class TestController extends Controller
{
    public function indexAction()
    {
        $data = [
            'name' => 'Vasil',
            'age' => '36',
        ];
        $this->view->render('Test', $data);
    }
}