<?php

namespace App\Core;

class Model implements DbModelInterface
{
    protected $table_name;
    protected $id_column;
    protected $db;
    protected $data = [];

    public function getDb()
    {
        //$this->data = require 'app/storage/storage.php';
        return $this->db = new Db();
    }

    public function all()
    {
        $sql = 'select * from ' . $this->table_name;
        $this->data = $this->getDb()->query($sql);
        
        return $this->data;
    }

    public function getTableName(): string
    {
        return $this->table_name;
    }

    public function getPrimaryKeyName(): string
    {
        return $this->id_column;
    }

    public function getId()
    {
        return filter_input(INPUT_GET, 'id');
    }
}