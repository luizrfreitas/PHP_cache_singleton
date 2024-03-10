<?php

namespace CacheSingleton\Module\User;

use CacheSingleton\Module\User\UserModel;
use CacheSingleton\Module\User\UserService;
use CacheSingleton\Module\User\User;

class UserController {

    private $userModel;
    private $userService;
    public function __construct() {
        $this->userModel = new UserModel();
        $this->userService = new UserService();
    }
    public function getUser(string $id): User
    {
        return $this->userModel->getById($id);
    }
    public function setUser(array $data): bool
    {
        $user = $this->userService->parseArrayToUser($data);
        return $this->userModel->setNewUser($user);
    }
    public function updateUser(array $data): User
    {
        $user = $this->userService->parseArrayToUser($data);
        return $this->userModel->updateUser($user);
    }
    public function deleteUser(string $id): void
    {
        $this->userModel->deleteById($id);
    }
}
