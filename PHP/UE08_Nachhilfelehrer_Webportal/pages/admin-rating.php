<?php
if (!isset($_SESSION['user_id'])) die("You have no permissions to access this site.");

if (isset($_GET['delete'])) {
    deleteRating($_GET['delete']);
}

$ratings = getAllRatings(); ?>

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
    <?php foreach ($ratings as $rating) { ?>
        <tr>
            <td><?php echo $rating['name']; ?></td>
            <td><?php echo nl2br($rating['content']); ?></td>
            <td><a href="mailto:<?php echo $rating['email']; ?>"><?php echo $rating['email']; ?></a></td>
            <td>
                <?php
                $i = $rating['stars'];
                while ($i-- != 0)
                    echo '<i class="material-icons yellow-text">grade</i>';
                ?>
            </td>
            <td><a href="?delete=<?php echo $rating['id']; ?>"><i class="material-icons right">delete</i></a></td>
        </tr>
    <?php } ?>
    </tbody>
</table>