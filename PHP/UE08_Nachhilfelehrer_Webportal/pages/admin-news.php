<?php
if (!isset($_SESSION['user_id'])) die("You have no permissions to access this site.");  // permission check

// add news article
if (isset($_POST['headline']) && isset($_POST['textarea']) && isset($_POST['image'])) {
    addNewsArticle($_POST['headline'], $_POST['textarea'], $_POST['image']);
    echo '<script>  M.toast({html: \'Der Eintrag wurde erfolgreich hinzugefügt!\'})</script>';
}

// delete news article
if (isset($_GET['delete'])) {
    deleteNewsArticle($_GET['delete']);
    echo '<script>  M.toast({html: \'Der Eintrag wurde erfolgreich gelöscht!\'})</script>';
}

$news = getAllNews(); // get news from database
$images = getAllImages(); // get images from database for select at modal
?>

<div id="modal-news" class="modal">
    <div class="modal-content">
        <h4>Beitrag hinzufügen</h4>
        <form method="post" enctype="multipart/form-data" action="">
            <div class="row">
                <div class="input-field col s12">
                    <input id="headline" name="headline" type="text" class="validate" required>
                    <label for="headline">Titel</label>
                </div>

                <div class="input-field col s12">
                    <textarea id="textarea" name="textarea" class="materialize-textarea validate" required></textarea>
                    <label for="textarea">Artikel</label>
                </div>

                <div class="input-field col s12">
                    <select class="icons" name="image" required>
                        <?php foreach ($images as $img) {
                            echo '<option value="' . $img['sid'] . '" data-icon="/file/' . $img['sid'] . '">' . $img['name'] . '</option>';
                        } ?>
                    </select>
                    <label>Bild auswählen</label>
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

<a class="waves-effect waves-light btn modal-trigger" data-target="modal-news">Beitrag hinzufügen</a>

<table class="highlight responsive-table">
    <thead>
    <tr>
        <th style="width: 10vw;">Titel</th>
        <th>Artikel</th>
        <th style="width: 10vw;">Datum</th>
        <th style="width: 10vw;">Author</th>
        <th class="right"></th>
    </tr>
    </thead>
    <tbody>
    <?php foreach ($news as $file) { $author = getUserNameById($file['author']); ?>
        <tr>
            <td><?php echo $file['headline']; ?></td>
            <td><?php echo nl2br($file['content']); ?></td>
            <td><?php echo date( 'd.m.Y H:i', strtotime($file['timestamp'])); ?></td>
            <td><?php echo $author['firstname'] . " " . $author['lastname']; ?></td>
            <td><a href="?delete=<?php echo $file['id']; ?>"><i class="material-icons right red-text text-red-4">delete</i></a></td>
        </tr>
    <?php } ?>
    </tbody>
</table>

<script>
    $(document).ready(function(){
        $('.modal').modal(); // initialize all modals
        $('select').formSelect();  // initialize formset
    });
</script>