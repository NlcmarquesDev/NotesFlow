<?php

use App\Core\Authtenticator;

// Verificar se recebeu as informacoes do post

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

// verificar se os daods foram bem inseridos

// criar  base de seguranca nesses dados para inserir na base de dados

//verificar se existe esse usuário na base de dados

// verificar se a pass esta correcta

// lidar com todos esses erros

// redereciona a a página especifica do usuarios

// mostar so as notas es[ecificas para esse usuario
