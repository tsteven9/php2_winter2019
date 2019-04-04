<?php

$baseConfig['routes'] = [
    0 => [
        'GET',
        '/',
        'index',
    ],
    1 => [
        'GET',
        '/index[/{action}]',
        'index',
    ],
    2 => [
        ['GET', 'POST'],
        '/products[/{action}[/{id:[0-9]+}]]',
        'product',
    ],
    3 => [
        'GET',
        '/baz[/{action}]',
        'specialmodule/index',
    ],
    4 => [
        ['GET', 'POST'],
        '/admin[/{action}]',
        'specialmodule/index',
    ],
    5 => [
        ['GET', 'POST'],
        '/login',
        'login',
    ],
    6 => [
        'GET',
        '/logout',
        'logout',
    ],
];