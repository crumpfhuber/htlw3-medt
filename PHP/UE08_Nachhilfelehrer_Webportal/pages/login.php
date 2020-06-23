<?php
// check for login
if (isset($_POST['email']) && isset($_POST['password'])) {
    $user = getUser($_POST['email']); // get user out of database
    if (password_verify($_POST['password'], $user['password'])) { // check for correct password
        // set session variables
        $_SESSION['user_id'] = $user['id'];
        $_SESSION['firstname'] = $user['firstname'];
        $_SESSION['lastname'] = $user['lastname'];
    }
}
if (isset($_SESSION['user_id'])) // is user has session, redirect to admin lading page
    die('<meta http-equiv="refresh" content="0; URL=/admin-dashboard">');
?>

<div class="row">
    <form class="col s12" action="" method="post">

        <div class="row">
            <div class="input-field col s12">
                <input id="email" name="email" type="email" class="validate" required>
                <label for="email">E-Mail Adresse</label>
            </div>

            <div class="input-field col s12">
                <input id="password" name="password" type="password" class="validate" required>
                <label for="password">Passwort</label>
            </div>
        </div>

        <button class="btn waves-effect waves-light" type="submit" name="action">Anmelden
            <i class="material-icons right">send</i>
        </button>
    </form>
</div>