<ul class="collapsible">
    <?php
    $docs = getDownloadDocuments();
    foreach ($docs as $obj) { ?>
        <li>
            <div class="collapsible-header">
                <i class="material-icons">text_snippet</i>
                <?php echo $obj['description']; ?>
                <span class="new badge" data-badge-caption="Herunterladen" onclick="window.location = '/file/<?php echo $obj['file']; ?>'"></span>
            </div>
        </li>
    <?php } ?>
</ul>