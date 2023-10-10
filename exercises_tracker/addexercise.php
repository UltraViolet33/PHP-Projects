<?php

require_once "./inc/header.php";

$allUsers = $user->selectAllUsers();

if (!$allUsers) {
    Session::set("message", "You must registered at least one user before an exercise !");
    header("location:adduser.php");
    die;
}

if ($_SERVER['REQUEST_METHOD'] === "POST") {
    $insertExercise = $exercise->insertExercise();
}
?>
<div class="title-container">
    <h1>Add a Exercise</h1>
</div>
<div class="form-container">
    <div class="error-msg">
        <?php Session::displayAndUnset("message"); ?>
    </div>
    <form id="survey-form" method="POST">
        <div class="input-group">
            <select name="id_user">
                <option>Select a user</option>
                <?php foreach ($allUsers as $user) : ?>
                    <option <?= isset($_POST['id_user']) && $_POST['id_user'] == $user->id_user ? "selected" : null ?> value="<?= $user->id_user ?>"><?= $user->username ?></option>
                <?php endforeach; ?>
            </select>
        </div>
        <div class="input-group">
            <label for="description">Exercise Description : </label>
            <textarea cols="30" rows="10" name="description"><?= isset($_POST['description']) ? htmlspecialchars($_POST['description']) : null ?></textarea>
        </div>
        <div class="input-group">
            <label for="duration">Exercise Duration : </label>
            <input type="number" id="duration" name="duration" min="0" value="<?= isset($_POST['duration']) ? htmlspecialchars($_POST['duration']) : null ?>">
        </div>
        <div class="input-group">
            <label for="date">Exercise Date : </label>
            <input type="date" id="date" name="date" min="0" value="<?= isset($_POST['date']) ? htmlspecialchars($_POST['date']) : null ?>">
        </div>
        <button type="submit">Submit</button>
    </form>
</div>
<?php require_once "./inc/footer.php" ?>