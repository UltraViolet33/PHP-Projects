<?php
require_once "./inc/header.php";
$allUsers = $user->selectAllUsers();
?>
<div class="title-container">
    <h1>All Users</h1>
</div>
<div class="users-container">
    <?php if ($allUsers) : ?>
        <?php foreach ($allUsers as $user) : ?>
            <div class="user">
                <p class="user-item"><span>ID </span> : <?= $user->id_user ?></p>
                <p class="user-item"><span>Username</span> : <?= htmlspecialchars(ucfirst($user->username)) ?> </p>
            </div>
            <hr>
        <?php endforeach; ?>
    <?php else : ?>
        <p>There is not any registered users</p>
    <?php endif; ?>
</div>
<?php require_once "./inc/footer.php"?>