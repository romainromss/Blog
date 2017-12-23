<?php

namespace Romss\Routing;


class Route
{
    private $path;

    private $params;

    private $controller;

    private $method;

    public function __construct(string $method, string $path, string $controller, array $params) {
        $this->method = $method;
        $this->path = $path;
        $this->controller = $controller;
        $this->params = $params;
    }

    /**
     * @return string
     */
    public function getPath(): string
    {
        return $this->path;
    }

    public function setPath(string $newPath)
    {
        $this->path = trim($newPath);
        if ($this->path === '') {
            $this->path = '/';
        }
    }

    public function getParams(): array
    {
        return $this->params;
    }

    /**
     * @return string
     */
    public function getMethod(): string
    {
        return $this->method;
    }

    public function getController() {
        return $this->controller;
    }
}
