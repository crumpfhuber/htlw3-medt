<ul class="collapsible">
    <?php
    $docs = getAllInformationDocuments(); // get documents information from database

    foreach ($docs as $obj) { ?>
        <li onclick="window.location = '/file/<?php echo $obj['file']; ?>'">
            <div class="collapsible-header">
                <i class="material-icons">picture_as_pdf</i>
                <?php echo $obj['description']; ?>
                <span class="new badge" data-badge-caption="Online öffnen"></span>
            </div>
        </li>
    <?php } ?>
</ul>
