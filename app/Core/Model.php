<?php

namespace App\Core;

class Model 
{
    protected $data = [];

    public function __construct()
    {
        $this->data = require 'app/storage/storage.php';
    }

    public function all()
    {
        return $this->data;
    }
}