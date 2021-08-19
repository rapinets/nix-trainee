<?php

namespace App\Models;

use App\Core\Model;

class Post extends Model
{
    function __construct()
    {
        $this->table_name = "post";
        $this->id_column = "id";

    }
}