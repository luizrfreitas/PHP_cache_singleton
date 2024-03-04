<?php

require_once __DIR__ . '/../vendor/autoload.php';

use CacheSingleton\Service\Cache;

Cache::getInstance()->set('hello', 'world');

$var = Cache::getInstance()->get('hello');
echo $var;
