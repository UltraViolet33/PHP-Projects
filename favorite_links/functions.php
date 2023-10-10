<?php

function printMessage()
{
    if (!empty($_SESSION['msg'])) {
        echo $_SESSION['msg'];
        unset($_SESSION['msg']);
    }
}

function createRandomLink($lenght)
{
    $randomLink = "";
    $alphabet = [];

    for ($i = 0; $i < 10; $i++) {
        $alphabet[] = $i;
    }

    for ($i = 0; $i < $lenght; $i++) {
        $rand = rand(0, count($alphabet) - 1);
        $randomLink .= $alphabet[$rand];
    }

    return $randomLink;
}

function getData()
{
    $json = file_get_contents('data.json');
    $array = json_decode($json, true);
    if (is_null($array)) {
        $array = [];
    }
    return $array;
}

function writeData($key, $link)
{
    $data = getData();
    $array = [];
    $array['key'] = $key;
    $array['link'] = $link;
    $data[] = $array;
    $dataJSON = json_encode($data);
    if (file_put_contents("./data.json", $dataJSON)) {
        return true;
    }

    return false;
}

function redirectURL()
{
    if (isset($_GET['url'])) {
        header("Location: " . $_GET['url']);
    }
}
