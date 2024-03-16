<?php

namespace CacheSingleton\Module\User\Model;

use CacheSingleton\Service\Database;
use CacheSingleton\Module\User\User;
use CacheSingleton\Module\User\Service\UserService;

class UserModel {

    protected $service;
    public function __construct() {
        $this->service = new UserService();
    }

    public function getById(string $id): User
    {
        $row = Database::getInstance()->fetch("SELECT * FROM users WHERE id = {$id};");
        return $this->service->parseArrayToUser($row);
    }
}
