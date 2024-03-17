<?php

namespace CacheSingleton\Module\User\Model;

use CacheSingleton\Service\Database;
use CacheSingleton\Module\User\User;
use CacheSingleton\Module\User\Service\UserService;
use CacheSingleton\Module\User\Model\UserTable;

class UserModel {

    protected $service;
    protected $table;
    public function __construct() {
        $this->service = new UserService();
        $this->table = new UserTable();
    }

    public function getById(string $id): User
    {
        $row = Database::getInstance()->fetch("SELECT * FROM users WHERE id = {$id};");
        return $this->service->parseArrayToUser($row);
    }

    public function createNewUser(array $data): string
    {
        // TODO: $validatedData = $this->service->validateDataToUser($data);
        $userToInsert = $this->service->parseArrayToUser($data);
        return $this->table->insertUser($userToInsert);
    }
}
