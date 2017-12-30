<?php

namespace Romss\Routing;

use Romss\Controllers\ArticleController;
use Romss\Controllers\ArticleDetailsController;
use Romss\Controllers\HomeController;
use Romss\Controllers\LoginController;


return [
    'home' => [
        'method' => 'GET',
        'path' => '/',
        'controller' => HomeController::class
    ],

    'articles' => [
        'path' => '/article',
        'method' => 'GET',
        'controller' => ArticleController::class
    ],

    'articles_details' => [
        'path' => '/article/details/{id}',
        'method' => [
            'GET',
            'POST'
        ],
        'params' => [
            'id' => '\d+'
        ],
        'controller' => ArticleDetailsController::class
    ],

    'admin' => [
        'path' => '/admin',
        'method' => [
            'GET',
            'POST'
        ],
        'params' => [
            'id' => '\d+'
        ],
        'controller' => AdminController::class
    ],

    'contact' => [
        'path' => '/contact',
        'method' => [
            'GET',
            'POST'
        ],
        'controller' => ContactController::class
    ],

    'login' =>[
        'path' => '/login',
        'method' => [
            'GET',
            'POST'
        ],
        'controller' => LoginController::class
    ]
];

