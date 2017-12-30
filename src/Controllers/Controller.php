<?php

namespace Romss\Controllers;

use Twig_Environment;

class Controller
{
    protected $db;
    protected $twig;

    public function __construct($db, Twig_Environment $twig)
    {
        $this->db = $db;
        $this->twig = $twig;
    }

    /**
     * @param string $field
     * @return null|string
     */
    public function post(string $field)
    {
        return $_POST[$field] ?? null;
    }

    public function redirect($url)
    {
        header('HTTP/1.1 301 Moved Permanently', false, 301);
        header('Location: ' . $url);
        exit();
    }

    public function getInput($input): string
    {
        if (isset($_POST[$input])) return $input;
        return null;
    }

    /**
     * @param $file
     * @param array $params
     * @return string
     * @throws \Twig_Error_Loader
     * @throws \Twig_Error_Runtime
     * @throws \Twig_Error_Syntax
     */
    protected function render($file, $params = [])
    {
        return $this->twig->render($file.'.html.twig', $params);
    }
}
