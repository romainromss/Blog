<?php

namespace Romss\Controllers\Auth;


use Romss\Models\UsersTable;
use Swift_Mailer;
use Swift_Message;
use Swift_SmtpTransport;

class RegisterController extends VerifyAuthentication
{
    /**
     * @return string
     * @throws \Twig_Error_Loader
     * @throws \Twig_Error_Runtime
     * @throws \Twig_Error_Syntax
     */
    private function getRegister(){
        return $this->render('Register/register');
    }


    /**
     *
     */
    private function postRegister()
    {
        $email = $_POST['email'];
        $pass = $_POST['pass'];
        $pass_confirm = $_POST['pass_confirm'];

        $userTable = new UsersTable($this->db);
        $user = $userTable->getUserByEmail($email);


        if (filter_var($email, FILTER_VALIDATE_EMAIL) === $user['email']){
            $this->setFlash("danger", "Vous êtes déjà enregistré avec cette adresse mail");
            $this->redirect('/register');
        }

        $passLength = strlen($pass);
        if ($passLength < 8){
            $this->setFlash("danger", "Votre mot de passe doit contenir au minimum 8 caractères");
            $this->redirect('/register');
        }
        if ($pass != $pass_confirm){
            $this->setFlash("danger", "Le mot de passe de confirmation n'est pas identique à votre mot de passe");
            $this->redirect('/register');
        }
        $tokenRegister = $this->generateToken();
        $passwordHash = password_hash($email.'#-$'.$pass, PASSWORD_BCRYPT, ['cost' => 12]);

        $userRegister = $userTable->registerUser($passwordHash, $email, $tokenRegister);

        $renderHtml = '';
        $renderText = '';
        try {
            $user = [
                'id' => $userRegister,
                'email' => $email,
                'token' => $tokenRegister
            ];

            $renderHtml = $this->render('Mails/verify', [
                'user' => $user
            ]);
            $renderText = $this->render('Mails/verify', [
                'user' => $user
            ], 'text');
        } catch (\Twig_Error_Loader $e) {
        } catch (\Twig_Error_Runtime $e) {
        } catch (\Twig_Error_Syntax $e) {
        }

        // Connexion au smtp
        $transport = new Swift_SmtpTransport('localhost', 1025);

        // Container du mail
        $mailer = new Swift_Mailer($transport);

        // Le message à envoyer
        $message = new Swift_Message('Confirmation de votre compte');
        $message
            ->setFrom(['localhost@local.dev' => 'Admin localhost'])
            ->setTo([$email => explode('@', $email)[0]])
            ->setBody($renderHtml, 'text/html')
            ->addPart($renderText, 'text/plain');

        $result = $mailer->send($message);
        if ($result) {
            $this->setFlash('success', 'Un email vous a été envoyé pour confirmer votre compte');
        } else {
            $this->setFlash('warning', 'Une erreur est survenue lors de l\'envoie de la confirmation. Merci de contacter le SAV !');
        }

        $this->redirect('/');
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
       if ($_SERVER['REQUEST_METHOD'] === 'GET'){
           return $this->getRegister();
       } elseif ($_SERVER['REQUEST_METHOD'] === 'POST'){
           return $this->postRegister();
       }
       return 'Not Found';
    }
}