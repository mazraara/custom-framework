<?php

return [

    'database' => [
        'driver' => 'mysql',
        'host' => 'localhost',
        'database' => 'custom',
        'username' => 'root',
        'password' => 'secret',
        'options' => [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
        ]
    ],

];
