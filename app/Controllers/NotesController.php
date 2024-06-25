<?php

declare(strict_types=1);

namespace App\Controllers;

use App\Core\Database;

class NotesController
{

    public function index()
    {
        $db = new Database();
        $notes = $db->query('SELECT * FROM notes Where user_id = :id', [':id' => $_SESSION['user']['id']])->findAll();

        view('notes/show', [
            'notes' => $notes
        ]);
    }
}
