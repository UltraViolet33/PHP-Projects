<?php

session_start();
require_once './functions.php';

if (!isset($_POST['url']) || empty($_POST['url'])) {
    header("Location: index.php");
    $_SESSION['msg'] = "Veuillez remplit le formulaire";
    return;
}

$url = $_POST['url'];

if (filter_var($url, FILTER_VALIDATE_URL) === false) {
    header("Location: index.php");
    $_SESSION['msg'] = "URL non valide";
    return;
}

$link =  createRandomLink(15);

if (!writeData($link, $url)) {
    header("Location: index.php");
    $_SESSION['msg'] = "Un problème est survenu";
}

header("Location: index.php");
$_SESSION['msg'] = "Lien ok";
