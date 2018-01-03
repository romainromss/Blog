<?php

namespace Romss\Controllers\Auth;

use DateTime;
use DateTimeZone;
use Romss\Models\UsersTable;

class VerifyMailController extends VerifyAuthentication
{
    public function __invoke()
    {
        $id = $_GET['id'];
        $token = $_GET['token'];

        $userTable = new UsersTable($this->db);
        $user = $userTable->getUserById($id);
        if ($user === false || $user['email_token'] != $token){
            $this->setFlash("danger", "Votre lien d'activation n'est pas valide");
            $this->redirect('/');
        }

        $timezone = new DateTimeZone('Europe/Paris');
        $limit = new DateTime('-10 minute', $timezone);
        $registerAt = DateTime::createFromFormat('Y-m-d H:i:s', $user['register_at']);
        if ($limit > $registerAt){
            $this->setFlash("warning", "Votre lien n'est plus valide");
            $this->redirect('/');
        }

        $user['email_token'] = null;
        $userTable->updateUser($user);

        $this->setFlash("success", "Votre compte est actif. Vous pouvez vous connecter");
        $this->redirect('/');
    }

}