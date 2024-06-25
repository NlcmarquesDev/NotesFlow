<?php

declare(strict_types=1);

namespace App\Controllers;

class IndexController
{

    public function index()
    {
        view('index', [
            'title' => 'Welcome to NotaFlow',
            'description' => 'sdfasfas'
        ]);
    }
}
