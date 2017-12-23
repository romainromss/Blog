<?php


use Romss\App;
use Romss\Routing\Router;

require __DIR__ .'/../vendor/autoload.php';

$app = new App();

$router = new Router($app);
try {
    $result = $router->handleRequest($_SERVER['REQUEST_URI']);
} catch (Twig_Error_Loader $e) {
} catch (Twig_Error_Runtime $e) {
} catch (Twig_Error_Syntax $e) {
}
echo $result;

