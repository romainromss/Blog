<?php

namespace Romss;

use Twig_Environment;
use Twig_Extensions_Extension_Text;
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
            'cache' => false,
        ]);
        $this->twig->addExtension(new Twig_Extensions_Extension_Text());

        $this->db = new Database('mysql:host=127.0.0.1;dbname=blog', 'root', '23031991');
    }

    /**
     * @return Twig_Environment
     */
    public function getTwig(): Twig_Environment
    {
        return $this->twig;
    }

    /**
     * @return Database
     */
    public function getDb(): Database
    {
        return $this->db;
    }
}