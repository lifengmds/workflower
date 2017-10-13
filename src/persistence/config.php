<?php
return [

    /*
    |--------------------------------------------------------------------------
    | PDO Fetch Style
    |--------------------------------------------------------------------------
    |
    | By default, database results will be returned as instances of the PHP
    | stdClass object; however, you may desire to retrieve records in an
    | array format for simplicity. Here you can tweak the fetch style.
    |
    */

    'databases' => [

        'sqlite' => [
            'driver'   => 'sqlite',
            'database' => 'database.sqlite',
            'prefix'   => '',
        ],

        'mysql' => [
            'driver'    => 'mysql',
            'host'      => '183.6.168.58',
            //'host'      => '172.16.93.237',
            'database'  => 'cs_sd',
            'username'  => 'root',
            'password'  => '123Dianjia$%^',
            'port'  => '3308',
            'charset'   => 'utf8',
            'collation' => 'utf8_unicode_ci',
            'prefix'    => '',
            'strict'    => false
        ]
    ]
];