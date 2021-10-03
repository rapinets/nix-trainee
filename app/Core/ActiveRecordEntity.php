<?php


namespace App\Core;


use App\Core\Db;

abstract class ActiveRecordEntity
{
    /** @var int */
    protected $id;


    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @return static[]
     */
    public static function getAll(): array
    {
        $db = new Db();
        return $db->query("SELECT * FROM `" . static::getTableName() . "`;");
    }

    public static function getById(int $id): ?self
    {
        $db = new Db();
        $entities = $db->query(
            "SELECT * FROM `" . static::getTableName() . "` WHERE id=:id;",
            [':id' => $id]
        );
        return $entities ? $entities[0] : null;
    }

    abstract protected static function getTableName(): string;


}