<?php

use Romss\Routing\Router;


require __DIR__ . '/../vendor/autoload.php';

$url = '/';
if (isset($_SERVER['REQUEST_URI'])) {
    $url = parse_url($_SERVER['REQUEST_URI']);
    $url = trim($url['path'], '/');
    if (empty($url)) {
        $url = '/';
    }
}

$router = new Router();
$router->handleRequest($_SERVER['REQUEST_URI']);
