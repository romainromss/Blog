<?php

namespace Romss\Routing;

return [
    'home' => [
        'path' => '/',
        'methods' => [
            'GET',
            'POST'
        ],
        'controller' => HomeController::class // -> App\Action\HomeAction
    ],
    'articles_details' => [
        'path' => '/article/details/{id}',
        'params' => [
            'id' => '\S+'
        ],
        'controller' => ArticleDetailsController::class
    ],
];
