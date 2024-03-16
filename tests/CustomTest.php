<?php

declare(strict_types = 1);

require_once __DIR__ . '/../vendor/autoload.php';

use PHPUnit\Framework\TestCase;

class CustomTest extends TestCase {

    public function testIgnoredMethod()
    {
        $this->assertTrue(true);
    }
}
