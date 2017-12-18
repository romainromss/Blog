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
