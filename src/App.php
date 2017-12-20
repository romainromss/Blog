<?php

namespace Romss;

use Twig_Environment;
use Twig_Loader_Filesystem;

class App
{
    /**
     * @var Twig_Environment $twig
     */
    private $twig;
    private $db;

    public function __construct()
    {
        $loader = new Twig_Loader_Filesystem(__DIR__ . '/../Views');
        $this->twig = new Twig_Environment($loader, [
            'cache'=> false,
        ]);

        $this->db = new Database('mysql:host=127.0.0.1;dbname=blog', 'root', '23031991');
    }


    /**
     * @return string
     * @throws \Twig_Error_Loader
     * @throws \Twig_Error_Runtime
     * @throws \Twig_Error_Syntax
     */
    public function e404()
    {
        return $this->twig->render('errors/404.html.twig');
    }
}
