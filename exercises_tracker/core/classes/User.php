<?php

require_once "./core/classes/Database.php";
require_once "./core/classes/Session.php";


class User
{

    private Database $con;

    public function __construct()
    {
        $this->con = Database::getInstance();
    }


    public function selectAllUsers(): array|bool
    {
        $query = "SELECT * FROM users";
        return $this->con->read($query);
    }


    private function selectOneUsername(string $username): object|bool
    {
        $query = "SELECT username FROM users WHERE username = :username LIMIT 1";
        return $this->con->readOneRow($query, ['username' => $username]);
    }
    

    public function checkIfUserExists(int $id_user): object|bool
    {
        $query = "SELECT id_user FROM users WHERE id_user = :id_user LIMIT 1";
        return $this->con->readOneRow($query, ['id_user' => $id_user]);
    }


    public function insertUser(): bool|string
    {
        if (empty($_POST['username'])) {
            Session::set("message", "Please fill the username input !");
            return "Please fill the username input !";
        }

        if ($this->selectOneUsername($_POST['username'])) {
            Session::set("message", "This username already exists !");
            return "This username already exists !";
        }

        $query = "INSERT INTO users(username) VALUES(:username)";

        if ($this->con->write($query, ["username" => $_POST["username"]])) {
            Session::set("message", "User successfully created !");
            header("location: adduser.php");
            return null;
        }

        return false;
    }
}
