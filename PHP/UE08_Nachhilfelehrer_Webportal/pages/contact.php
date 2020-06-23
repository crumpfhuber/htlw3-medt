<?php
// add contact request
if (isset($_POST['firstname']) && isset($_POST['lastname']) && isset($_POST['email']) && isset($_POST['textarea'])) {
    $file = NULL;
    if (isset($_FILES['file']) && $_FILES['file']['tmp_name'] != "") // if file is set, upload it and attach sid to contact request
        $file = addFile($_FILES['file']['name'], $_FILES['file']['type'], file_get_contents($_FILES['file']['tmp_name']), "Uploaded via Contact Form");
    addContactRequest($_POST['firstname'], $_POST['lastname'], $_POST['email'], $_POST['textarea'], $file);
    echo '<script>  M.toast({html: \'Das Formular wurde erfolgreich abgesendet. Vielen Dank!\'})</script>';
}
?>

<div class="row">
    <form class="col s12" method="post" enctype="multipart/form-data">

        <div class="row">
            <div class="input-field col s6">
                <input id="firstname" name="firstname" type="text" class="validate" required>
                <label for="firstname">Vorname</label>
            </div>

            <div class="input-field col s6">
                <input id="lastname" name="lastname" type="text" class="validate" required>
                <label for="lastname">Nachname</label>
            </div>
        </div>

        <div class="row">
            <div class="input-field col s12">
                <input id="email" name="email" type="email" class="validate" required>
                <label for="email">E-Mail Adresse</label>
            </div>


            <div class="input-field col s12">
                <textarea id="textarea" name="textarea" class="materialize-textarea validate" required></textarea>
                <label for="textarea">Anfrage</label>
            </div>

            <div class="file-field col s12">
                <div class="btn">
                    <span>Datei hochladen</span>
                    <input type="file" name="file">
                </div>
                <div class="file-path-wrapper">
                    <input class="file-path validate" type="text" placeholder="Eine Datei kann angehängt werden.">
                </div>
            </div>
        </div>

        <button class="btn waves-effect waves-light" type="submit" name="action">Absenden
            <i class="material-icons right">send</i>
        </button>
    </form>
</div>