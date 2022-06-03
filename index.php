<?php
if (isset($_GET['date'])) {
    $date = $_GET['date'];
    if (is_numeric($date)) {
        $date = (int)$date;
        $data['unix'] = $date;
        $data['date'] = date("d-m-Y", $date);
    } else if (preg_match('~^[0-9]{1,2}-[0-9]{1,2}-[0-9]{4}~', $date)) {
        $data['unix'] =  strtotime($date);
        if ($data['unix'] === false) {
            $data['unix'] = "no timestamp for this date";
        }
        $data['date'] = $date;
    } else {
        $data['error'] = "An error occured, invalid syntax for date.";
    }
} else {
    $date = time();
    $data['unix'] = $date;
    $data['date'] = date("d-m-Y", $date);
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Timestamp Microservice</title>
</head>

<body>
    <header>
        <h1>Timestamp Microservice</h1>
    </header>
    <main>
        <div>
            <p>You can put a date in the URL like this : https://timestamp-microservice.test/?date=your_date </p>
            <p>With the timestamp format or the date format : dd-mm-yyyy</p>
            <?php foreach ($data as $indice => $el) : ?>
                <p><span class="element"><?= $indice ?> : </span><?= $el ?></p>
            <?php endforeach; ?>
        </div>
    </main>
    <footer>
        By Ulysse Valdenaire, see the code on my Github
    </footer>
</body>

</html>