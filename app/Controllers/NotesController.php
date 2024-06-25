<?php

declare(strict_types=1);

namespace App\Controllers;

use App\Core\Database;
use App\Data\NotesDAO;

class NotesController
{

    public function index()
    {
        $notes = new NotesDAO();

        $notesUser = $notes->getNotesByUser($_SESSION['user']['id']);

        // dd($notesUser);
        view('notes/show', [
            'notes' => $notesUser
        ]);
    }

    public function create()
    {

        if (isset($_POST)) {
            $data = [
                "title" => htmlspecialchars($_POST['title']),
                "message" => htmlspecialchars($_POST['message']),
                "user_id" => (int)$_SESSION['user']['id'],
                "date_note" => date("Y-m-d H:i:s"),
                "priority" => 0
            ];

            $notes = new NotesDAO();
            $notes->addNote($data);
            $_SESSION['alert'] = 'Note save successfully';
            redirect('/notes');
        }
        redirect('/notes');
    }
}
