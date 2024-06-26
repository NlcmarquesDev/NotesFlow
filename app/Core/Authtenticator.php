<?php

declare(strict_types=1);

namespace App\Core;

use App\Data\UsersDAO;

class Authtenticator
{

    public function attempt($email, $password)
    {
        $users = new UsersDAO();

        $user = $users->getUserByEmail($email);


        if ($user) {
            if (password_verify($password, $user['password'])) {
                $_SESSION['user'] = ["email" => $email, "id" => $user['id']];
                session_regenerate_id(true);

                // dd($_SESSION['user']);
                return true;
            }
        }
        return false;
    }

    public function auth()
    {
        if (!$_SESSION['user'] ?? false) {
            redirect('/');
        }
    }

    public function isUser()
    {
        if ($_SESSION['user']) {
            redirect('/notes');
        }
    }
}
