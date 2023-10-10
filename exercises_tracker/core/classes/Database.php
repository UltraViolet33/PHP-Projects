<?php

require_once './core/config.php';

class Database
{
    private ?PDO $PDOInstance = null;

    private static $instance = null;


    private function __construct()
    {
        $string = DB_TYPE . ":host=" . DB_HOST . ";dbname=" . DB_NAME;
        $this->PDOInstance  = new PDO($string, DB_USER, DB_PASS);
    }


    public static function getInstance(): static
    {
        if (is_null(self::$instance)) {
            self::$instance = new Database();
        }
        return self::$instance;
    }


    public function read(string $query, array $data = array()): array|bool
    {
        $statement = $this->PDOInstance->prepare($query);
        $result = $statement->execute($data);

        if ($result) {
            $data = $statement->fetchAll(PDO::FETCH_OBJ);

            if (is_array($data) && count($data) > 0) {
                return $data;
            }
        }
        return false;
    }


    public function readOneRow(string $query, array $data = array()): object|bool
    {
        $statement = $this->PDOInstance->prepare($query);
        $result = $statement->execute($data);

        if ($result) {
            $data = $statement->fetch(PDO::FETCH_OBJ);
            if (is_object($data)) {
                return $data;
            }
        }
        return false;
    }


    public function write(string $query, array $data = array()): bool
    {
        $statement = $this->PDOInstance->prepare($query);
        return $statement->execute($data);
    }


    public function getLastInsertId(): string
    {
        return $this->PDOInstance->lastInsertId();
    }
}
