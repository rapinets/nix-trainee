<?php

namespace App\Controllers;

use App\Core\Controller;

class PostController extends Controller
{
    public function indexAction()
    {
        $model = $this->getModel('post');
        $data = $model->all();
        
        $this->view->render('Post', $data);
    }
}