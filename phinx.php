<?php

return
[
    'paths' => [
        'migrations' => '%%PHINX_CONFIG_DIR%%/db/migrations',
        'seeds' => '%%PHINX_CONFIG_DIR%%/db/seeds'
    ],
    'environments' => [
        'default_migration_table' => 'phinxlog',
        'default_environment' => 'development',
        'production' => [
            'adapter' => 'mysql',
            'host' => 'localhost:8888',
            'name' => 'production_db',
            'user' => 'root',
            'pass' => 'root',
            'port' => '8889',
            'charset' => 'utf8',
        ],
        'development' => [
            'adapter' => 'mysql',
            'host' => 'localhost:8888',
            'name' => 'development_db',
            'user' => 'root',
            'pass' => 'root',
            'port' => '8889',
            'charset' => 'utf8',
            'unix_socket' => '/Applications/MAMP/tmp/mysql/mysql.sock',
        ],
        'testing' => [
            'adapter' => 'mysql',
            'host' => 'localhost:8888',
            'name' => 'testing_db',
            'user' => 'root',
            'pass' => 'root',
            'port' => '8889',
            'charset' => 'utf8',
        ]
    ],
    'version_order' => 'creation'
];
