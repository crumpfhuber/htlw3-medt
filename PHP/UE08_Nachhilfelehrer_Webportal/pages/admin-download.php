<?php
if (!isset($_SESSION['user_id'])) die("You have no permissions to access this site."); // permission check

// add file and download document
if (isset($_FILES['file']) && isset($_POST['description'])) {
    $file = addFile($_FILES['file']['name'], $_FILES['file']['type'], file_get_contents($_FILES['file']['tmp_name']), "Uploaded via Download CP");
    addDownloadDocument($file, $_POST['description']);
    echo '<script>  M.toast({html: \'Der Eintrag wurde erfolgreich hinzugefügt!\'})</script>';
}

// delete download document
if (isset($_GET['delete'])) {
    deleteDownloadDocument($_GET['delete']);
    echo '<script>  M.toast({html: \'Der Eintrag wurde erfolgreich gelöscht!\'})</script>';
}

// get documents from database
$docs = getAllDownloadDocuments(); ?>

<div id="modal-upload" class="modal">
    <div class="modal-content">
        <h4>Downloadbereich-Material hochladen</h4>
        <form method="post" enctype="multipart/form-data" action="">
            <div class="row">
                <div class="input-field col s12">
                    <input id="description" name="description" type="text" class="validate">
                    <label for="description">Beschreibung</label>
                </div>

                <div class="file-field col s12">
                    <div class="btn">
                        <span>Datei hochladen</span>
                        <input type="file" name="file" class="validate" required>
                    </div>
                    <div class="file-path-wrapper">
                        <input class="file-path validate" type="text" placeholder="Eine Datei kann angehängt werden.">
                    </div>
                </div>
            </div>

            <button class="btn waves-effect waves-light" type="submit" name="action">Hochladen
                <i class="material-icons right">send</i>
            </button>
        </form>
    </div>
    <div class="modal-footer">
        <a href="#" class="modal-close waves-effect waves-green btn-flat">Close</a>
    </div>
</div>

<a class="waves-effect waves-light btn modal-trigger" data-target="modal-upload">Datei hochladen</a>

<table class="highlight responsive-table">
    <thead>
    <tr>
        <th>Datei URL</th>
        <th>Beschreibung</th>
        <th>Mime Type</th>
        <th class="right"></th>
    </tr>
    </thead>
    <tbody>
    <?php foreach ($docs as $doc) { ?>
        <tr>
            <td><a href="/file/<?php echo $doc['file']; ?>"><?php echo $doc['file']; ?></a></td>
            <td><?php echo $doc['description']; ?></td>
            <td><?php echo $doc['mime_type']; ?></td>
            <td><a href="?delete=<?php echo $doc['id']; ?>"><i class="material-icons right red-text text-red-4">delete</i></a></td>
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