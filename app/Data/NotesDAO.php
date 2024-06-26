<?php

declare(strict_types=1);

namespace App\Data;

use App\Core\Database;

class NotesDAO
{
    protected $db;
    public function __construct()
    {
        $this->db = new Database();
    }

    public function getNotesByUser($id)
    {
        return $this->db->query('SELECT * FROM notes Where user_id = :id', [':id' => $id])->findAll();
    }

    public function addNote($data)
    {
        $this->db->query('INSERT INTO notes (body, user_id, title, date_note, priority) Values (:body, :user_id, :title, :date_note, :priority)', [
            ':user_id' => $data['user_id'],
            ':body' => $data['message'],
            ':title' => $data['title'],
            'date_note' => $data['date_note'],
            'priority' => $data['priority']
        ]);
    }
    public function deleteNote($id)
    {
        $this->db->query("DELETE FROM notes WHERE id = :id", [':id' => $id]);
    }
}
