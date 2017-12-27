<?php

namespace Romss\Routing;


class Route
{
    private $path;

    private $params;

    private $matches = [];

    private $controller;

    private $method;

    public function __construct(string $method, string $path, string $controller, array $params) {
        $this->method = $method;
        $this->setPath($path);
        $this->controller = $controller;
        $this->params = $params;
    }

    public function match(string $request)
    {
        $request = trim($request, '/');
        if ($request === '') {
            $request = '/';
        }

        $subRegex = preg_replace_callback('#{([\w]+)}#', [$this, 'paramMatch'], $this->path);
        $regexTarget = "#^{$subRegex}$#i";

        if (!preg_match($regexTarget, $request, $matchValues)) {
            return false;
        }
        array_shift($matchValues);

        $subRegexName = preg_replace('#{([\w]+)}#', '([^/]+)', $this->path);
        $regexTargetName = "#^{$subRegexName}$#i";

        preg_match($regexTargetName, $this->path, $matchNames);
        array_shift($matchNames);

        foreach ($matchNames as $index => $name) {
            $name = str_replace('{', '', $name);
            $name = str_replace('}', '',  $name);

            $this->matches[$name] = $_GET[$name] = $matchValues[$index];
        }

        return true;
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
        $this->path = trim($newPath, '/');
        if ($this->path === '') {
            $this->path = '/';
        }
    }

    public function getParams(): array
    {
        return $this->params;
    }

    /**
     * @return mixed
     */
    public function getMatches()
    {
        return $this->matches;
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

    private function paramMatch(array $matches)
    {
        $name = $matches[1];
        if (isset($this->params[$name])) {
            $result = $this->params[$name];
            return "({$result})";
        }

        return '([^/]+)';
    }
}
