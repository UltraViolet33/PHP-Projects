<?php

require_once "./core/classes/User.php";
require_once "./core/classes/Database.php";
require_once "./core/classes/Session.php";

class Exercise
{

    private Database $con;
    private User $user;


    public function __construct()
    {
        $this->user = new User();
        $this->con = Database::getInstance();
    }


    public function selectExerciseFromUser(): object|bool
    {
        if (!isset($_GET['id_user']) || empty($_GET['id_user'])) {
            Session::set("message", "Please fill the user input !");
            return false;
        }

        // Check the id_user
        if (!is_numeric($_GET['id_user']) || $_GET['id_user'] < 1 || !$this->user->checkIfUserExists($_GET['id_user'])) {
            Session::set("message", "Please, register a valid user !");
            return false;
        }

        $query = "SELECT exercises.description, exercises.duration, exercises.date, users.username FROM exercises 
                INNER JOIN users ON exercises.id_user =  users.id_user WHERE exercises.id_user = :id_user";

        $allExercises = $this->con->read($query, ["id_user" => $_GET['id_user']]);

        $result = new STDClass();

        foreach ($allExercises as  $exercises) {
            $result->username = $exercises->username;
            unset($exercises->username);
            $result->exercises[] = $exercises;
        }

        return $result;
    }


    public function insertExercise(): bool|string
    {
        $dataForm = ["id_user", "description", "duration"];

        foreach ($dataForm as $data) {
            if (!isset($_POST[$data])) {
                Session::set("message", "Please fill all inputs !");
                return false;
            }

            if (empty($_POST[$data])) {
                Session::set("message", "Please fill all inputs !");
                return false;
            }
        }

        // Check the id_user
        if (!is_numeric($_POST['id_user']) || $_POST['id_user'] < 1 || !$this->user->checkIfUserExists($_POST['id_user'])) {
            Session::set("message", "Please, register a valid user !");
            return false;
        }

        // Check the duration
        if (!is_numeric($_POST['duration']) || $_POST['duration'] < 0) {
            Session::set("message", "Please, register a valid duration !");
            return false;
        }

        // Check the date
        $date = date('Y-m-d');
        $date_regex = '/^(19|20)\d\d[\-\/.](0[1-9]|1[012])[\-\/.](0[1-9]|[12][0-9]|3[01])$/';

        if (isset($_POST['date']) && !empty($_POST['date'])) {
            if (!preg_match($date_regex, $_POST['date'])) {
                Session::set("message", "The date input must be a date with the format dd-mm-yyyy");
                return false;
            }

            $date = $_POST['date'];
        }

        $description = htmlspecialchars($_POST['description']);
        $values = ["id_user" => $_POST["id_user"], "description" => $description, "duration" => $_POST["duration"], "date" => $date];

        $query = "INSERT INTO exercises(description, duration, date, id_user) VALUES(:description, :duration, :date, :id_user)";

        if ($this->con->write($query, $values)) {
            Session::set("message", "Exercise successfully created !");
            header("location:addexercise.php");
            return null;
        }

        return false;
    }
}
