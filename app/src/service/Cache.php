<?php

namespace src\service;

final class Cache {

    private static $instance = null;
    private $connection = null;

    protected function __construct() {
        if (!isset(self::$instance)) {
            $this->connection = new \Redis();
            $this->connection->connect('cache', 6379);
        }
    }

    /**
     * @throws \Exception
     */
    public function __wakeup(): void
    {
        throw new \Exception("Cannot unserialize a singleton.");
    }

    public static function getInstance(): Cache
    {
        if (!isset(self::$instance)) {
            self::$instance = new Cache();
        }

        return self::$instance;
    }

    public function set(string $key, string $value): void
    {
        $this->connection->set($key, $value);
    }

    public function get(string $key): void
    {
        $this->connection->get($key, $value);
    }

    public function delete(string $key): void
    {
        $this->connection->delete($key);
    }

    public function flushAll(): void
    {
        $this->connection->flushAll();
    }


}
