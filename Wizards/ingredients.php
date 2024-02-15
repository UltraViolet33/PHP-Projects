<?php include_once './templates/header.php';
$ingredients = $wizardApi->getAllIngredients();
?>

<div class="container my-3">
    <div class="row justify-content-center">
        <h1>All ingredients</h1>
        <?php foreach ($ingredients  as $ingredient) : ?>
            <div class="card col-12 col-md-3 m-3" style="width: 18rem;">
                <div class="card-body">
                    <h5 class="card-title"><?= $ingredient['name']    ?></h5>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>

<?php include_once './templates/footer.php' ?>