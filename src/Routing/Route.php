<?php

namespace Romss\Routing;


class Route
{
    private $path;

    private $params;

    private $controller;

    public function __construct(string $path, array $params, string $controller){

    }

    public function getController(){
        return $this->controller;
    }

    public function getParams($path){

    }

}