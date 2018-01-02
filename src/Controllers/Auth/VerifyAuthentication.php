<?php

namespace Romss\Controllers\Auth;

use Romss\Controllers\Controller;

class  VerifyAuthentication extends Controller
{
    protected function generateToken($user = null)
    {
        if ($user) {
            $token = $user['id'].'---'.hash('sha512', $user['email'].'#~!*$'.$user['password']);
        } else {
            $token = hash('sha512', uniqid().'---'.time());
            $_SESSION['csrf'] = $token;
        }

        return $token;
    }
}