<?php include_once './templates/header.php';
$spells = $wizardApi->getAllSpells();
?>

<div class="container my-3">
    <div class="row justify-content-center">
        <h1>All spells</h1>
        <?php foreach ($spells  as $spell) : ?>
            <div class="card col-12 col-md-3 m-3" style="width: 18rem;">
                <div class="card-body">
                    <h5 class="card-title"><?= $spell['name']    ?></h5>
                    <p class="card-text"><?= $spell['effect'] ?></p>
                    <a href="/spell.php?id=<?= $spell['id'] ?>" class="btn btn-primary">See details</a>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>

<?php include_once './templates/footer.php' ?>