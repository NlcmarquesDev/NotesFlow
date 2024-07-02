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
        return $this->db->query('SELECT * FROM notes WHERE user_id = :id ORDER BY id DESC ', [':id' => $id])->findAll();
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
    public function updateNote($data)
    {
        $this->db->query("UPDATE notes SET body=:body, title=:title, date_note=:date_note, priority=:priority WHERE id = :id", [
            ':id' => $data['id'],
            'body' => $data['body'],
            'date_note' => $data['date_note'],
            'title' => $data['title'],
            'priority' => $data['priority']
        ]);
    }


    public function deleteNote($id)
    {
        $this->db->query("DELETE FROM notes WHERE id = :id", [':id' => $id]);
    }

    public function getNoteById($id)
    {
        return $this->db->query("SELECT * FROM notes WHERE id=:id", [':id' => $id])->find();
    }

    public function search($word, $id)
    {
        return $this->db->query("SELECT * FROM notes WHERE title  LIKE :word OR body LIKE :word AND user_id=:id ", [':word' => $word, ':id' => $id])->findAll();
    }
}
