<?php

namespace CacheSingleton\Module\User\Service;

use CacheSingleton\Module\User\User;

class UserService
{
    public function __construct()
    {
        // Not necessary
    }

    public function parseArrayToUser(array $data): User
    {
        return new User(
            $data['name'],
            $data['email']
        );
    }
}
