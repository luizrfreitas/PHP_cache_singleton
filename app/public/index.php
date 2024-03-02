<?php

require_once __DIR__ . '/../src/service/Cache.php';

use src\service\Cache;

Cache::getInstance()->set('hello', 'world');
