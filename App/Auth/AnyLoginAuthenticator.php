<?php

namespace App\Auth;
use App\Core\AAuthenticator;

class AnyLoginAuthenticator extends DummyAuthenticator
{

    public function login($login, $password): bool
    {
        if ($login == $password) {
            $_SESSION['user'] = $login;
            return true;
        }
        return false;
    }
}