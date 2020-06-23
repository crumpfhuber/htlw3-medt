<div class="collection">
    <?php // get page list from settings and print all non restricted pages
    foreach ($page_list as $file => $page)
        if ($page['restricted'] == false)
            echo '<a href="/' . $file . '" class="collection-item">' . $page['name'] . '</a>';
    ?>
</div>