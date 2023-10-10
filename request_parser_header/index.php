<?php
$data = [];
$data['ip_adress'] = $_SERVER['REMOTE_ADDR'];
$data['langage'] = $_SERVER['HTTP_ACCEPT_LANGUAGE'];
$data['software '] = $_SERVER['HTTP_USER_AGENT'];
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./style.css">
    <title>Request Header Parser</title>
</head>

<body>
    <header>
        <h1>Timestamp Microservice</h1>
    </header>
    <main>
        <div id="content">
            <?php foreach ($data as $indice => $el) : ?>
                <p><span class="element"><?= $indice ?> : </span><?= $el ?></p>
            <?php endforeach; ?>
        </div>
    </main>
</body>

</html>