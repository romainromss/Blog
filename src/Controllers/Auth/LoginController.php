<?php

namespace  Romss\Controllers\Auth;

use Romss\Controllers\Controller;
use \Romss\Models\UsersTable;

class LoginController extends  Controller
{
    /**
     * @param $email
     */
    private function postLogin($email)
    {
        //faire deco session  dans logout
        if ($_SESSION['email'] === $email) {
            $this->redirect('/');
        }

        $getUser = new UsersTable($this->db);
        $getUser = $getUser->getUserByEmail($email);

        if ($getUser){
            $_SESSION['email'] = $getUser['email'];
            $this->redirect('/');
        }

        $this->redirect('/login');

    }

    /**
     * @return string
     * @throws \Twig_Error_Loader
     * @throws \Twig_Error_Runtime
     * @throws \Twig_Error_Syntax
     */
    private function getLogin()
    {
        return $this->render('Login/login');
    }


    /**
     * @param array $params
     * @return string
     * @throws \Twig_Error_Loader
     * @throws \Twig_Error_Runtime
     * @throws \Twig_Error_Syntax
     */
    public function __invoke(array $params)
    {
         if ($_SERVER['REQUEST_METHOD'] === 'GET') {
            return $this->getLogin();
        }
        elseif ($_SERVER['REQUEST_METHOD'] === 'POST'){
             // récuperer post email et pass
            // verfifier que email exist et pass
            // faire une coup de bcrypt du pass et verifier que ce soit la meme valeur dans la bdd
            // mettre email et token (généré?) dans la session (ou cookie, a voir avec quenti pour la secu)
            // si dans la session email et token alors auth
             return $this->postLogin($_POST['email']);
        }
        return 'Not found';
    }
}

