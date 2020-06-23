<?php
if (!isset($_SESSION['user_id'])) die("You have no permissions to access this site."); // permission check

?>

<h5>Willkommen <?php echo $_SESSION['firstname'] . ' ' . $_SESSION['lastname']; ?> 👋</h5>