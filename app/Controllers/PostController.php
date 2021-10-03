<?php

namespace App\Controllers;

use App\Core\Controller;
use App\Models\Post;

class PostController extends Controller
{
    public function indexAction()
    {
        var_dump(Post::getAll());
        dump(Post::getAll());
        $posts = Post::getAll();

        $this->view->render('Posts', $posts);
    }

    public function showAction(int $id)
    {
        $post = Post::getById($id);
    }
    
    /*public function indexAction()
    {
        $model = $this->getModel('post');
        $data = $model->all();
        
        $this->view->render('Post', $data);
    }*/
}