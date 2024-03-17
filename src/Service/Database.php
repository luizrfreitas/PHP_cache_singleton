<?php

namespace CacheSingleton\Service;

use PDO;
use CacheSingleton\Entity\Service;

final class Database extends Service
{
    private static $instance = null;
    private $connection = null;

    private function __construct()
    {
        if (!isset(self::$instance)) {
            $this->connection = new PDO(
                "mysql:host=db;dbname={$_ENV['DB_DATABASE']}",
                $_ENV['DB_USER'],
                $_ENV['DB_PASSWORD']
            );
            $this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        }
    }

    /**
     * @throws \Exception
     */
    public function __wakeup(): void
    {
        throw new \Exception("Cannot unserialize a singleton!");
    }

    public static function getInstance(): Database
    {
        if (!isset(self::$instance)) {
            self::$instance = new Database();
        }

        return self::$instance;
    }

    public function executeInsert(string $table, array $columns, array $values): string
    {
        $columnsImplode = implode(',', $columns);
        $valuesImplode = $this->formatValuesArrayToString($values);

        $query = "INSERT INTO {$table} ({$columnsImplode}) VALUES ({$valuesImplode});";

        $stmt = $this->connection->prepare($query);
        $stmt->execute();

        return $this->connection->lastInsertId();
    }

    private function formatValuesArrayToString(array $array): string
    {
        foreach ($array as &$value) {
            $value = "'{$value}'";
        }
        return implode(',', $array);
    }
}
