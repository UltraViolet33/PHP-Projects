<?php include_once './templates/header.php';
$houses = $wizardApi->getAllHouses();
?>

<div class="container my-3">
    <div class="row justify-content-center">
        <h1>All houses</h1>
        <?php foreach ($houses  as $house) : ?>
            <div class="card col-12 col-md-3 m-3" style="width: 18rem;">
                <div class="card-body">
                    <h5 class="card-title"><?= $house['name']    ?></h5>
                    <a href="/spell.php?id=<?= $house['id'] ?>" class="btn btn-primary">See details</a>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>

<?php include_once './templates/footer.php' ?>