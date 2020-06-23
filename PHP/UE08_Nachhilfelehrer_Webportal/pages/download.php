<ul class="collapsible">
    <?php
    $docs = getAllDownloadDocuments(); // get documents from database

    foreach ($docs as $obj) { ?>
        <li onclick="window.location = '/file/<?php echo $obj['file']; ?>'">
            <div class="collapsible-header">
                <i class="material-icons">
                    <?php // echo icon name according the file type
                    switch (explode("/", $obj['mime_type'])[0]) {
                        case "image":
                            echo "photo_library";
                            break;
                        case "application":
                            echo "library_books";
                            break;
                        case "video":
                            echo "video_library";
                            break;
                        case "audio":
                            echo "library_music";
                            break;
                        default:
                            echo "insert_drive_file";
                            break;
                    }
                    ?>
                </i>
                <?php echo $obj['description']; ?>
                <span class="new badge" data-badge-caption="Online öffnen"></span>
            </div>
        </li>
    <?php } ?>
</ul>