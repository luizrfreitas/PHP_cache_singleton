<?php

namespace CacheSingleton\Module\User\Model;

use CacheSingleton\Service\Database;
use CacheSingleton\Module\User\User;

class UserTable
{
    public const TABLE = 'users';

    public const PRIMARY_KEY_ID = 'id';
    public const COLUMNS = [
        'name',
        'email'
    ];

    public function __construct()
    {
        // Construct placeholder.
    }

    public function insertUser(array $data): string
    {
        return Database::getInstance()->executeInsert(
            self::TABLE,
            self::COLUMNS,
            $data
        );
    }
}
