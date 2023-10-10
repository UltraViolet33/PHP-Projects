<?php
require_once "./inc/header.php";

$allUsers = $user->selectAllUsers();

if (!$allUsers) {
    Session::set("message", "You must registered at least one user before an exercise !");
    header("location:adduser.php");
    die;
}

if ($_SERVER['REQUEST_METHOD'] === "GET" && isset($_GET['id_user'])) {
    $result = $exercise->selectExerciseFromUser();
    
    if (!$result) {
        Session::set("message", "Please choose a valid user !");
        header("location: exercisesuser.php");
        die;
    }
}
?>
<div class="title-container">
    <h1>Display Users Exercises</h1>
</div>
<div class="form-container">
    <div class="error-msg">
        <?php Session::displayAndUnset("message"); ?>
    </div>
    <form id="survey-form" method="GET">
        <div class="input-group">
            <select name="id_user">
                <option>Select a user</option>
                <?php foreach ($allUsers as $user) : ?>
                    <option <?= isset($_POST['id_user']) && $_POST['id_user'] == $user->id_user ? "selected" : null ?> value="<?= $user->id_user ?>"><?= $user->username ?></option>
                <?php endforeach; ?>
            </select>
        </div>
        <button type="submit">Submit</button>
    </form>
    <?php if (isset($result)) : ?>
        <div class="exercises">
            <h2>Exercises for <?= $result->username ?></h2>
            <?php foreach ($result->exercises as $exercise) : ?>
                <p>Description : <?= $exercise->description ?> </p>
                <p>Duration : <?= $exercise->duration ?> </p>
                <p>Date: <?= $exercise->date ?> </p>
            <?php endforeach; ?>
        </div>
    <?php endif; ?>
</div>
<?php
require_once "./inc/footer.php";
?>