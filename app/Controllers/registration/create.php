<?php

use App\Core\Database;
use App\Core\ValidationForm;

$db = new Database();

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
    return view('registration/show', [
        'errors' => $errors
    ]);
}


if (empty($errors)) {
    $result = $db->query('SELECT * FROM users WHERE email =:email', [
        'email' => $_POST['email']
    ])->find();

    if ($result) {
        redirect('registration/show');
    } else {
        // dd($_POST);
        $result = $db->query('INSERT INTO users (email, password, firstname, lastname) VALUES (:email, :password , :firstname, :lastname)', [
            ':email' => htmlspecialchars($_POST['email']),
            ':password' => password_hash($_POST['password'], PASSWORD_BCRYPT),
            ":firstname" => htmlspecialchars($_POST['firstname']),
            ":lastname" => htmlspecialchars($_POST['lastname'])
        ]);

        $_SESSION['user'] = [
            'email' => $_POST['email'],
        ];
        redirect('/notes');
    }
}
