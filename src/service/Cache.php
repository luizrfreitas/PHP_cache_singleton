<?php

namespace CacheSingleton\Service;

use CacheSingleton\Entity\Service;

final class Cache extends Service {

    private static $instance = null;
    private $connection = null;

    private function __construct() {
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
        throw new \Exception("Cannot unserialize a singleton!");
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

    public function del(string $key): void
    {
        $this->connection->del($key);
    }

    public function flushAll(): void
    {
        $this->connection->flushAll();
    }
}
