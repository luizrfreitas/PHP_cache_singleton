<?php

namespace CacheSingleton\Module\User\Model;

use CacheSingleton\Service\Database;
use CacheSingleton\Module\User\User;

class UserTable
{
    public const TABLE = 'users';
    public const COLUMNS = [
        'id',
        'name',
        'email'
    ];

    public function __construct()
    {
        // Construct placeholder.
    }

    public function insertUser(User $user): string
    {
        return Database::getInstance()->executeInsert(
            self::TABLE,
            self::COLUMNS,
            $user->__toArray()
        );
    }
}
