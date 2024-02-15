
<?php include_once './templates/header.php';


if(!isset($_GET['id']) || empty($_GET['id']))
{
    header("Location: spells.php");
}

$spell = $wizardApi->getSpellById($_GET['id']);

?>

<div class="container my-3">
    <div class="row justify-content-center">
        <h1><?= $spell->name ?></h1>
        <p>Incantation: <?= $spell->incantation ?></p>
        <p>effect: <?= $spell->effect ?></p>            
       
    </div>
</div>

<?php include_once './templates/footer.php' ?>