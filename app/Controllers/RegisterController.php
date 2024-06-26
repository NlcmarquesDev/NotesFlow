<?php

declare(strict_types=1);

namespace App\Controllers;

use App\Data\UsersDAO;
use App\Core\Authtenticator;
use App\Core\ValidationForm;

class RegisterController
{

    public static function index()
    {
        (new Authtenticator)->isUser();
        view('register/show');
    }

    public function create()
    {
        $users = new UsersDAO();

        $errors = [];


        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            if (!ValidationForm::string($_POST['firstname'])  && !ValidationForm::string($_POST['lastname'])) {
                $errors['names'] = 'Please insert a first name or Last name between 3 and 255 characters.';
            }

            if (!ValidationForm::email($_POST['email'])) {
                $errors['email'] = 'Please provide a valid email adress.';
            }

            if (!ValidationForm::string($_POST['password'], 7)) {
                $errors['password'] = 'Please insert a new password between 7 and 255 characters.';
            }
        }

        if (!empty($errors)) {
            return view('register/show', [
                'errors' => $errors
            ]);
        }


        if (empty($errors)) {
            $result = $users->getUserByEmail($_POST['email']);;

            if ($result) {
                redirect('/register/show');
            } else {
                // dd($_POST);
                $users->createUser($_POST['email'], $_POST['password'], $_POST['firstname'], $_POST['lastname']);

                $user_id = $users->getUserByEmail($_POST['email']);

                $_SESSION['user'] = [
                    'id' => $user_id['id'],
                    'email' => $_POST['email'],
                ];
                redirect('/notes');
            }
        }
    }
}
