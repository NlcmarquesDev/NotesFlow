<?php

declare(strict_types=1);

namespace App\Controllers;

use App\Core\Authtenticator;

class IndexController
{

    public function index()
    {
        (new Authtenticator)->isUser();

        view('index', [
            'title' => 'Welcome to NotaFlow',
            'description' => 'sdfasfas'
        ]);
    }
}
