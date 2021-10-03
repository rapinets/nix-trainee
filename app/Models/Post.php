<?php

namespace App\Models;

use App\Core\Model;
use App\Core\Db;
use App\Core\ActiveRecordEntity;

class Post extends ActiveRecordEntity
{
    /** @var string */
    private $name;

    /** @var string */
    private $text;


    /**
     * @return string
    */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @return string
    */
    public function getText(): string
    {
        return $this->text;
    }



    protected static function getTableName(): string
    {
        return 'post';
    }


    /*function __construct()
    {
        $this->table_name = "post";
        $this->id_column = "id";

    }*/
}