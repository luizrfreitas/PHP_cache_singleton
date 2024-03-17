<?php

use CacheSingleton\Module\User\Controller\UserController;
use CacheSingleton\Module\User\User;

final class UserControllerTest extends CustomTest
{
    public function testcreateNewUserReturnsString(): void
    {
        $userController = new UserController();
        $user = $userController->createNewUser([
            'name' => 'teste',
            'email' => 'test'
        ]);

        $this->assertIsString($user);
    }
}
