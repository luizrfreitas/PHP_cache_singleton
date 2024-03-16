<?php

use CacheSingleton\Module\User\Service\UserService;
use CacheSingleton\Module\User\User;

final class UserServiceTest extends CustomTest
{
    public function testParseArrayToUserWithCorrectData(): void
    {
        $userService = new UserService();
        $id = 1;
        $name = 'Test Test';
        $email = 'test@test.com';

        $data = $userService->parseArrayToUser([
            'id' => $id,
            'name' => $name,
            'email' => $email
        ]);

        $this->assertInstanceOf(User::class, $data);
        $this->assertEquals($id, $data->getId());
        $this->assertEquals($name, $data->getName());
        $this->assertEquals($email, $data->getEmail());
    }

    // TODO: testParseArrayToUserWithNotEnoughKeys(): void
    // TODO: testParseArrayToUserWithMoreKeysThanNeeded(): void
    // TODO: testParseArrayToUserWithIncorrectKeys(): void

    // TODO: testParseArrayToUserPassingInvalidTypes(): void

    // TODO: testParseArrayToUserPassingSQLInjection(): void
    // TODO: testParseArrayToUserPassingJavaScriptInjection(): void
    // TODO: testParseArrayToUserPassingPHPInjection(): void

    // TODO: testParseArrayToUserPassingInvalidEmailFormat(): void
}
