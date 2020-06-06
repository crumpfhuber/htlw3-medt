<?php
session_start();

require_once 'settings.php';
require_once 'database.php';

$page = isset($_GET['page']) ? $_GET['page'] : "home";

if (($page_name = $page_list[$page]) == NULL)
    die("An error occurred. Please contact the webmaster!");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Nachhilfe / <?php echo $page_name; ?></title>

    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <script type="text/javascript" src="/assets/jquery.js"></script>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>

    <script type="text/javascript" src="/assets/script.js"></script>

    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
</head>
<body>

<?php if (isset($_SESSION['user_id'])) { ?>
    <ul id="admin-dropdown" class="dropdown-content">
        <li><span><?php echo $_SESSION['firstname'] . ' ' . $_SESSION['lastname']; ?></span></li>
        <li class="divider"></li>
        <li><a href="#!">News-Verwaltung</a></li>
        <li><a href="#!">Dateien</a></li>
        <li><a href="#!">Kontaktanfragen</a></li>
        <li class="divider"></li>
        <li><a href="/logout">Abmelden</a></li>
    </ul>
<?php } ?>

<nav>
    <div class="nav-wrapper">
        <a href="/home" class="brand-logo">logo</a>
        <ul class="right hide-on-med-and-down">
            <li><a href="/home">Startseite</a></li>
            <li><a href="/news">Aktuelles</a></li>
            <li><a href="/information">Infobereich</a></li>
            <li><a href="/download">Downloadbereich</a></li>
            <li><a href="/rating">Bewertungen</a></li>
            <li><a href="/contact">Kontaktanfrage</a></li>
            <?php if (isset($_SESSION['user_id'])) { ?>
                <li><a class="dropdown-trigger blue lighten-1" href="#" data-target="admin-dropdown">Webmaster Bereich<i class="material-icons right">arrow_drop_down</i></a></li>
            <?php } ?>
        </ul>
    </div>
</nav>

<div class="container">
    <h3><?php echo $page_name; ?></h3>

    <?php include 'pages/' . $page . '.php'; ?>
</div>


<footer class="page-footer">
    <div class="container">
        <div class="row">
            <div class="col l6 s12">
                <h5 class="white-text">Nachhilfe Rumpfhuber</h5>
                <p class="grey-text text-lighten-4">
                    Clemens Rumpfhuber<br>
                    Fischergasse 30<br>
                    A-4600 Wels<br><br>
                    E-Mail: mail@clemens-rumpfhuber.at<br>
                    Telefon: +43 7242 65801
                </p>
            </div>
            <div class="col l4 offset-l2 s12">
                <h5 class="white-text">Weitere Seiten</h5>
                <ul>
                    <li><a class="grey-text text-lighten-3" href="/contact">Kontaktanfrage</a></li>
                    <li><a class="grey-text text-lighten-3" href="/map">Lageplan</a></li>
                    <li><a class="grey-text text-lighten-3" href="/imprint">Impressum</a></li>
                    <li><a class="grey-text text-lighten-3" href="/privacy">Datenschutzerklärung</a></li>
                    <li><a class="grey-text text-lighten-3" href="/login">Anmelden</a></li>
                </ul>
            </div>
        </div>
    </div>
    <div class="footer-copyright">
        <div class="container">
            © 2020 Clemens Rumpfhuber
            <a class="grey-text text-lighten-4 right" href="https://www.clemens-rumpfhuber.at">Developed with &hearts; by Clemens Rumpfhuber</a>
        </div>
    </div>
</footer>

</body>
</html>