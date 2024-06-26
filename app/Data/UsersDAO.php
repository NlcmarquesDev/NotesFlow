<?php

declare(strict_types=1);

namespace App\Data;

use App\Core\Database;

class UsersDAO
{
    protected $db;

    public function __construct()
    {
        $this->db = new Database();
    }

    public function createUser($email, $password, $firstname, $lastname)
    {
        $this->db->query('INSERT INTO users (email, password, firstname, lastname) VALUES (:email, :password , :firstname, :lastname)', [
            ':email' => htmlspecialchars($_POST['email']),
            ':password' => password_hash($_POST['password'], PASSWORD_BCRYPT),
            ":firstname" => htmlspecialchars($_POST['firstname']),
            ":lastname" => htmlspecialchars($_POST['lastname'])
        ]);
    }
    public function getUserByEmail($email)
    {
        return $this->db->query('SELECT * From users WHERE email =:email', [':email' => $email])->find();
    }
}
