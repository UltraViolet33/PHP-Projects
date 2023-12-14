<?php
require("../vendor/autoload.php");
include "../app/core/config.php";
include "../app/core/functions.php";
include "../app/core/controller.php";
include "../app/core/database.php";
include "../app/core/app.php";

$whoops = new \Whoops\Run;
$whoops->pushHandler(new \Whoops\Handler\PrettyPageHandler);
$whoops->register();