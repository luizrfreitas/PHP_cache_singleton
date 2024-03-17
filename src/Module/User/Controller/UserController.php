<?php

namespace CacheSingleton\Module\User\Controller;

use CacheSingleton\Module\User\Model\UserModel;
use CacheSingleton\Module\User\Service\UserService;
use CacheSingleton\Module\User\User;

class UserController
{
    private $userModel;
    private $userService;

    public function __construct() {
        $this->userModel = new UserModel();
        $this->userService = new UserService();
    }

    public function getUserById(string $id): User
    {
        return $this->userModel->getById($id);
    }
}
