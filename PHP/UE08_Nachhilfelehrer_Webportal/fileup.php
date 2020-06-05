<form method="post" autocomplete="off" action="" enctype="multipart/form-data">
    <div class="form-group">
        <input type="file" class="form-control-file" id="fileUpload" name="fileUpload" aria-describedby="fileHelp">
    </div>
    <button type="submit" class="btn btn-primary">Hochladen</button>
</form>

<?php
require_once 'database.php';


print_r($_FILES['fileUpload']);

addFile($_FILES['fileUpload']['name'], $_FILES['fileUpload']['type'], file_get_contents($_FILES['fileUpload']['tmp_name']), 1);
