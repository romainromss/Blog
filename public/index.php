<?php

use Romss\App;
use Romss\Routing\Router;

session_start();

require __DIR__ .'/../vendor/autoload.php';

$app = new App();
$app->checkRemember();

$router = new Router($app);

try {
    $result = $router->handleRequest($_SERVER['REQUEST_URI']);
    echo $result;
} catch (Twig_Error_Loader $e) {
} catch (Twig_Error_Runtime $e) {
} catch (Twig_Error_Syntax $e) {
}
