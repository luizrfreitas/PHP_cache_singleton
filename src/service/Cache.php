<?php

require_once __DIR__ . "/../config.php";

namespace CacheSingleton\Service;

final class Cache {

    private static $instance = null;
    private $connection = null;

    protected function __construct() {
        if (!isset(self::$instance)) {
            $this->connection = new \Redis();
            $this->connection->connect($_ENV['CACHE_HOST'], $_ENV['CACHE_PORT']);
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

    public function set(string $key, string $value): bool
    {
        return $this->connection->set($key, $value);
    }

    public function get(string $key): string
    {
        return $this->connection->get($key);
    }
}
