<?php
if (!isset($_SESSION['user_id'])) die("You have no permissions to access this site."); // permission check

// delete rating
if (isset($_GET['delete'])) {
    deleteRating($_GET['delete']);
}

// get ratings from database
$ratings = getAllRatings(); ?>

<table class="highlight responsive-table">
    <thead>
    <tr>
        <th style="width: 10vw;">Name</th>
        <th>Bewertung</th>
        <th style="width: 12vw;">E-Mail</th>
        <th style="width: 10vw;">Sterne</th>
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
            <td><a href="?delete=<?php echo $rating['id']; ?>"><i class="material-icons right red-text text-red-4">delete</i></a></td>
        </tr>
    <?php } ?>
    </tbody>
</table>