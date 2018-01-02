<?php
namespace Romss\Controllers\Auth;

class LogoutController extends VerifyAuthentication
{
    public function __invoke()
    {
        unset($_SESSION['auth']);
        setcookie('remember', '', -1, '/', null, false, true);
        $this->setFlash('success', 'Vous êtes bien déconnecté');
        $this->redirect('/');
    }
}