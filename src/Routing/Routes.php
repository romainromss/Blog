<?php

namespace Romss\Routing;

use Romss\Controllers\ArticleController;
use Romss\Controllers\ArticleDetailsController;
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
            'id' => '\S+'
        ],
        'controller' => ArticleDetailsController::class
    ],
];

