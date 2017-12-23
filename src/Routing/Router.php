<?php

namespace Romss\Routing;



use Romss\App;
use Romss\Controllers\PageNotFoundController;


class Router
{
    /**
     * @var Route[] $routes
     */
    private $routes;
    /**
     * @var App
     */
    private $app;

    public function __construct(App $app)
    {
        $this->app = $app;

        $this->loadRoutes();
    }


    public function loadRoutes()
    {
        $routes = require __DIR__ .'/Routes.php';
        foreach ($routes as $route) {
            if (is_string($route['method'])) {
                $route['method'] = [$route['method']];
            }

            if (empty($route['params'])) {
                $route['params'] = [];
            }

            foreach ($route['method'] as $method) {
                $this->routes[] = new Route($method, $route['path'], $route['controller'], $route['params']);
            }
        }
    }

    /**
     * @param string $request
     * @return string
     * @throws \Twig_Error_Loader
     * @throws \Twig_Error_Runtime
     * @throws \Twig_Error_Syntax
     */
    public function handleRequest(string $request)
    {
        foreach ($this->routes as $route) {
            if ($request === $route->getPath()) {
                $controllerName = $route->getController();
                $controller = new $controllerName($this->app->getDb(), $this->app->getTwig());
                return $controller($route->getParams());
            }
        }

        $pageNF = new PageNotFoundController($this->app->getDb(), $this->app->getTwig());
        return $pageNF();
    }
}

