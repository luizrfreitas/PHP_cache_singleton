<?php

require_once __DIR__ . "/config.php";


return
[
    'paths' => [
        'migrations' => '%%PHINX_CONFIG_DIR%%/db/migrations',
        'seeds' => '%%PHINX_CONFIG_DIR%%/db/seeds'
    ],
    'environments' => [
        'default_migration_table' => 'phinxlog',
        'default_environment' => $_ENV['ENVIRONMENT'],
        'production' => [
            'adapter' => 'mysql',
            'host' => 'localhost',
            'name' => 'production_db',
            'user' => 'root',
            'pass' => '',
            'port' => '3306',
            'charset' => 'utf8',
        ],
        'development' => [
            'adapter' => 'mysql',
            'host' => $_ENV['DB_NAME'],
            'name' => $_ENV['DB_DATABASE'],
            'user' => $_ENV['DB_USER'],
            'pass' => $_ENV['DB_PASSWORD'],
            'port' => $_ENV['DB_PORT'],
            'charset' => 'utf8',
        ],
        'testing' => [
            'adapter' => 'mysql',
            'host' => 'localhost',
            'name' => 'database_test',
            'user' => 'admin',
            'pass' => 'admin',
            'port' => 3307,
            'charset' => 'utf8',
        ]
    ],
    'version_order' => 'creation'
];
