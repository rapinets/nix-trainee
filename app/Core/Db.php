<?php

namespace App\Core;

use PDO;
use App\Core\DbModelInterface;

require_once 'app/etc/db.php';

class Db
{
    private static $pdo = null;

    public function getConnection()
    {
        if (!self::$pdo) {
            $dsn = 'mysql:host='. MYSQL_HOST .';port='. MYSQL_PORT .';dbname='. DB_NAME . ';charset=utf8';
            $options = array(
                PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'utf8'",
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_EMULATE_PREPARES => false
            );
            try {
                self::$pdo = new PDO($dsn, DB_USERNAME , DB_PASSWORD, $options);
            } catch (\PDOException $e) {
                echo "Connection failed: ".$e->getMessage();
                exit();
            }
        }
        return self::$pdo;
    }

    public function query($sql, $parameters = [])
    {
        $dbh = $this->getConnection();
        $stmt = $dbh->prepare($sql);

        $result = $stmt->execute($parameters);

        if ($result !== false)
        {
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        }
        else
        {
            return false;
        }
    }

    public function deleteEntity(DbModelInterface $model)
    {
        $dbh = $this->getConnection();
        $sql = sprintf("DELETE FROM %s WHERE %s = ?",
            $model->getTableName(),
            $model->getPrimaryKeyName()
        );
        $statement = $dbh->prepare($sql);

        $statement->execute([$model->getId()]);
    }

}