<?php

namespace Romss\Routing;

use Romss\Controllers\ArticleController;
use Romss\Controllers\ArticleDetailsController;
use Romss\Controllers\Auth\LoginController;
use Romss\Controllers\Auth\LogoutController;
use Romss\Controllers\HomeController;



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
        'path' => '/panel',
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
    ],

    'logout' =>[
        'path' => '/logout',
        'method' => [
            'GET'
        ],
        'controller' => LogoutController::class
    ],

    'register' =>[
        'path' => '/register',
        'method' => [
            'GET'
        ],
        'controller' => RegisterController::class
    ]
];

