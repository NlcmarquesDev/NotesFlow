<?php

declare(strict_types=1);

namespace App\Controllers;

use App\Core\Database;
use App\Data\NotesDAO;

class NotesController
{
    protected $notes;

    public function __construct()
    {
        $this->notes = new NotesDAO();
    }
    public function index()
    {


        $notesUser = $this->notes->getNotesByUser($_SESSION['user']['id']);

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

            // $notes = new NotesDAO();
            $this->notes->addNote($data);
            $_SESSION['alert'] = 'Note save successfully';
            redirect('/notes');
        }
        redirect('/notes');
    }

    public function delete()
    {
        if (isset($_GET)) {
            $checkId = $this->notes->getNotesByUser((int)$_SESSION['user']['id']);

            // dd($checkId);

            if (!empty($checkId)) {
                $this->notes->deleteNote((int)$_GET['id']);
                $_SESSION['alert'] = 'Note deleted successfully';
                redirect('/notes');
            }
        }
        redirect('/notes');
    }
}
