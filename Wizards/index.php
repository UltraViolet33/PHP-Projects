<?php include_once './templates/header.php';
$wizards = $wizardApi->getAllWizards();
?>

<div class="container my-3">
    <div class="row justify-content-center">
        <h1>All wizards</h1>
        <?php foreach ($wizards  as $wizard) : ?>
            <div class="card col-12 col-md-3 m-3" style="width: 18rem;">
                <div class="card-body">
                    <h5 class="card-title"><?= $wizard['lastname'] . " " . $wizard['firstname']   ?></h5>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>

<?php include_once './templates/footer.php' ?>