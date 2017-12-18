<?php


require __DIR__ . '/../vendor/autoload.php';

$url = '/';
if (isset($_SERVER['REQUEST_URI'])) {
    $url = parse_url($_SERVER['REQUEST_URI']);
    $url = trim($url['path'], '/');
    if (empty($url)) {
        $url = '/';
    }
}

$app = new \Romss\App();
try {
    try {
        echo $app->routing($url);
    } catch (Twig_Error_Loader $e) {
    } catch (Twig_Error_Runtime $e) {
    } catch (Twig_Error_Syntax $e) {
    }
} catch (InvalidArgumentException $e) {
    header('HTTP/1.1 404 Not Found');
    try {
        echo $app->e404();
    } catch (Twig_Error_Loader $e) {
    } catch (Twig_Error_Runtime $e) {
    } catch (Twig_Error_Syntax $e) {
    }
}
