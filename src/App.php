<?php

namespace Romss;

use Romss\Models\UsersTable;
use Twig\Extensions\TextExtension;
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
            'debug' => true,
        ]);
        $this->twig->addExtension(new Twig_Extensions_Extension_Text());
        $this->twig->addExtension(new \Twig_Extension_Debug());

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

    public function checkRemember()
    {
        if (isset($_SESSION['auth']) || !isset($_COOKIE['remember'])) {
            return false;
        }

        // 1---hash
        $values = explode('---', $_COOKIE['remember']);

        if (count($values) !== 2) {
            return false;
        }

        $id = intval($values[0]);
        $token = $values[1];

        $userTable = new UsersTable($this->db);
        $user = $userTable->getUserById($id);

        $checkToken = hash('sha512', $user['email'] . '#~!*$' . $user['password']);

        if ($user && $token === $checkToken) {
            unset($user['password']);

            $_SESSION['auth'] = $user;
            setcookie('remember', $token, time() + 3600 * 24 * 7, '/', null, false, true);
        }

        return true;
    }
}