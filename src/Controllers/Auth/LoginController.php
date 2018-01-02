<?php

namespace  Romss\Controllers\Auth;

use Romss\Models\UsersTable;

class LoginController extends  VerifyAuthentication
{
    /**
     * Check login forms
     */
    private function postLogin()
    {
        $email = $_POST['email'] ?? null;
        $password = $_POST['pass'] ?? null;
        $remember = $this->getInput('remember');

        $userTable = new UsersTable($this->db);
        $user = $userTable->getUserByEmail($email);


        if ($_SESSION['auth']['email'] === $email) {
            $this->setFlash('warning', 'Vous êtes déjà connecté !');
            $this->redirect('/');
        }

        if ($user && password_verify($password, $user['password']) && $user['email_token'] === null) {
            if (!empty($remember)){
                $token = $this->generateToken($user);
                setcookie('remember', $token, time() + 3600 * 24 * 7, '/', null, false, true);
            }

            unset($user['password']);
            $_SESSION['auth'] = $user;

            $this->setFlash('success', 'Vous êtes maintenant connecté !');
            $this->redirect('/');
        }

        $this->setFlash('danger', 'Mauvais mot de passe ou email');
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
             return $this->postLogin();
        }
        return 'Not found';
    }
}

