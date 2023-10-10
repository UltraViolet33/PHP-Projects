<?php

session_start();
require_once './functions.php';

$links = getData();
if (isset($_GET['url'])) {
    redirectURL();
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>URL Shortener Microservice</title>
</head>

<body>
    <header>
        <h1>Favorites Links Microservice</h1>
    </header>
    <main>
        <div id="content">
            <form action="action.php" method="POST">
                <div>
                    <label for="url">URL : </label>
                    <input type="text" name="url" placeholder="https://www.website.com/">
                    <input type="submit" name="postURL" value="POST URL">
                </div>
                <?php printMessage() ?>
            </form>
            <div>
                <h2>Links : </h2>
                <?php foreach ($links as $link) : ?>
                    <form>
                        <input type="submit" value="<?= $link['link'] ?>" name="url" />
                    </form>
                <?php endforeach; ?>
            </div>
        </div>
    </main>
</body>

</html>