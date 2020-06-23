<ul class="collapsible">
    <?php
    $docs = getAllInformationDocuments(); // get documents information from database

    foreach ($docs as $obj) { ?>
        <li>
            <div class="collapsible-header">
                <i class="material-icons">picture_as_pdf</i>
                <?php echo $obj['description']; ?>
                <span class="new badge" data-badge-caption="Online öffnen" onclick="window.location = '/file/<?php echo $obj['file']; ?>'"></span>
            </div>
        </li>
    <?php } ?>
</ul>
