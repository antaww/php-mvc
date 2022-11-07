<?php

namespace Application\Lib\Database;

use PDO;

class DatabaseConnection
{
    public ?PDO $database;

    public function getConnection(): PDO
    {
        if ($this->database === null) {
            $this->database = new PDO('mysql:host=localhost;dbname=php_mvc_todolist;charset=utf8', 'root');
        }

        return $this->database;
    }
}