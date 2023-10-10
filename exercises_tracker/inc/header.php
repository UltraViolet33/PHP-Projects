<?php
require_once "./core/classes/User.php";
require_once "./core/classes/Exercise.php";
require_once "./core/classes/Session.php";

Session::init();

$user = new User();
$exercise = new Exercise();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./assets/style.css">
    <title>Home Page</title>
</head>

<body>
    <nav class="navbar">
        <div class="logo">Exos Tracker</div>
        <ul class="nav-links">
            <input type="checkbox" id="checkbox_toggle" />
            <label for="checkbox_toggle" class="hamburger">&#9776;</label>
            <div class="menu">
                <li><a href="/">Home</a></li>
                <li><a href="./exercisesuser.php">Users - Exercises</a></li>
                <li><a href="./adduser.php">Add User</a></li>
                <li><a href="./addexercise.php">Add Exercise</a></li>
            </div>
        </ul>
    </nav>