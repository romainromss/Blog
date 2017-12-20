<?php

namespace Romss\Routing;


class Router
{
    private $routes;

    public function __construct()
    {
        $this->loadRoutes();
    }

    public function loadRoutes()
    {
        $routes = require __DIR__ . '/Routes.php';
        foreach ($routes as $route) {
            $this->routes[] = new Route($route['path'], $route['params'], $route['controller']);
        }
    }


    /**
     * @param string $request
     * @return PageNotFoundController
     */
    public function handleRequest(string $request)
    {
        foreach ($this->routes as $route) {
            switch ($request) {
                case $route->getPath():
                    $controller = new $route->getController();
                    return $controller($route->getParams()); // -> Instance de HomeAction
                    break;

                default:
                    return new PageNotFoundController();
                    break;
            }
        }
    }
}

