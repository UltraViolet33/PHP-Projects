<?php

require_once "./inc/header.php";

if ($_SERVER['REQUEST_METHOD'] === "POST" && isset($_POST['username'])) {
    $insertUser = $user->insertUser();
}
?>
<div class="title-container">
    <h1>Add a User</h1>
</div>
<div class="form-container">
    <form id="survey-form" method="POST">
        <div class="input-group">
            <input type="text" id="username" placeholder="Enter the username" name="username" required>
        </div>
        <button type="submit">Submit</button>
    </form>
    <div class="error-msg">
        <?php Session::displayAndUnset("message"); ?>
    </div>
</div>
<?php require_once "./inc/footer.php" ?>