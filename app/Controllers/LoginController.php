<?php

declare(strict_types=1);

namespace App\Controllers;

use App\Core\Authtenticator;

class LoginController
{

    public  function index()
    {
        view('login/show');
    }

    public  function log()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            if (isset($_POST['email']) && isset($_POST['password'])) {

                $email = $_POST['email'];
                $password = $_POST['password'];

                $auth = new Authtenticator();
                $login = $auth->attempt($email, $password);
                if ($login) {

                    //buscra todas as notas referentes a este usuario
                    redirect('/notes');
                }
                $_SESSION['oldValue'] = $email;
                $_SESSION['errors'] = 'The email or password is incorrect , please try again!';
                redirect('/login');
            }
        }
    }
    public  function logout()
    {
        (new Authtenticator)->logout();

        redirect('/');
    }
}
