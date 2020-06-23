<div class="row">
<?php
$news = getAllNews(); // get news from database

foreach ($news as $obj) { ?>
        <div class="col s12 m6">
            <div class="card">
                <div class="card-image">
                    <img src="/file/<?php echo $obj['image']; ?>">
                    <span class="card-title"><?php echo $obj['headline']; ?></span>
                </div>
                <div class="card-content">
                    <p><?php echo nl2br($obj['content']); ?></p>
                </div>
            </div>
        </div>
<?php } ?>
</div>