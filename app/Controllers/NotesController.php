<?php

declare(strict_types=1);

namespace App\Controllers;


use App\Data\NotesDAO;
use App\Core\Authtenticator;

class NotesController
{
    protected $notes;

    public function __construct()
    {
        $this->notes = new NotesDAO();
    }
    public function index()
    {
        $auth = (new Authtenticator)->auth();


        $notesUser = $this->notes->getNotesByUser($_SESSION['user']['id']);

        // dd($_SESSION);
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
                "priority" => $_POST['priority'] ?? 0
            ];

            // $notes = new NotesDAO();
            $this->notes->addNote($data);
            $_SESSION['alert'] = 'Note save successfully';
            redirect('/notes');
        }
        redirect('/notes');
    }

    public function edit()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $data = [
                "title" => htmlspecialchars($_POST['title']),
                "body" => htmlspecialchars($_POST['message']),
                "id" => (int)$_POST['id'],
                "date_note" => date("Y-m-d H:i:s"),
                "priority" => $_POST['priority'] ?? 0
            ];

            $this->notes->updateNote($data);
            $_SESSION['alert'] = 'Note updated successfully';
            redirect('/notes');
        }
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
