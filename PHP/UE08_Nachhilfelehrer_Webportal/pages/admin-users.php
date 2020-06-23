<?php
if (!isset($_SESSION['user_id'])) die("You have no permissions to access this site."); // permission check

// add user
if (isset($_POST['firstname']) && isset($_POST['lastname']) && isset($_POST['email']) && isset($_POST['password'])) {
    addUser($_POST['firstname'], $_POST['lastname'], $_POST['email'], $_POST['password']);
    echo '<script>  M.toast({html: \'Der Eintrag wurde erfolgreich hinzugefügt!\'})</script>';
}

// delete user
if (isset($_GET['delete'])) {
    deleteUser($_GET['delete']);
    echo '<script>  M.toast({html: \'Der Eintrag wurde erfolgreich gelöscht!\'})</script>';
}

// get users from database
$users = getAllUsers(); ?>

<div id="modal-user" class="modal">
    <div class="modal-content">
        <h4>Benutzer hinzufügen</h4>
            <form method="post" enctype="multipart/form-data" action="">
                <div class="row">
                    <div class="input-field col s12">
                        <input id="firstname" name="firstname" type="text" class="validate">
                        <label for="firstname">Vorname</label>
                    </div>

                    <div class="input-field col s12">
                        <input id="lastname" name="lastname" type="text" class="validate">
                        <label for="lastname">Nachname</label>
                    </div>

                    <div class="input-field col s12">
                        <input id="email" name="email" type="email" class="validate">
                        <label for="email">E-Mail Adresse</label>
                    </div>

                    <div class="input-field col s12">
                        <input id="password" name="password" type="password" class="validate">
                        <label for="password">Passwort</label>
                    </div>
                </div>

                <button class="btn waves-effect waves-light" type="submit" name="action">Absenden
                    <i class="material-icons right">send</i>
                </button>
        </form>
    </div>
    <div class="modal-footer">
        <a href="#" class="modal-close waves-effect waves-green btn-flat">Close</a>
    </div>
</div>

<a class="waves-effect waves-light btn modal-trigger" data-target="modal-user">Benutzer hinzufügen</a>

<table class="highlight responsive-table">
    <thead>
    <tr>
        <th>Vorname</th>
        <th>Nachname</th>
        <th>E-Mail Adresse</th>
        <th class="right"></th>
    </tr>
    </thead>
    <tbody>
    <?php foreach ($users as $user) { ?>
        <tr>
            <td><?php echo $user['firstname']; ?></td>
            <td><?php echo $user['lastname']; ?></td>
            <td><?php echo $user['email']; ?></td>
            <td><a href="?delete=<?php echo $user['id']; ?>"><i class="material-icons right red-text text-red-4">delete</i></a></td>
        </tr>
    <?php } ?>
    </tbody>
</table>

<script>
    (function ($) {
        $(function () {
            $('.modal').modal(); // initialize all modals
        });
    })(jQuery);
</script>