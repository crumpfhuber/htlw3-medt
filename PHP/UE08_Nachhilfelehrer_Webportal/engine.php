<?php
session_start(); // start session if user will authenticate

// disable error printing. it will printed in log file ... for security purpose
ini_set("display_errors", 0);
ini_set("display_startup_errors", 0);
error_reporting(0);

require_once 'settings.php'; // include settings
require_once 'database.php'; // include databse

$page = isset($_GET['page']) ? $_GET['page'] : "home"; // get page name; if not exists it will be `home`

if (!array_key_exists($page, $page_list)) { // if page not in list display 404 error
    $_GET['error_code'] = 404;
    include 'error.php'; // display 404 - not found
    die();
}

if ($page_list[$page]['restricted'] && !isset($_SESSION['user_id'])) { // check if user has webmaster permissions
    $_GET['error_code'] = 403;
    include 'error.php'; // display 403 - forbidden
    die();
}
?>

<!DOCTYPE html>
<html lang="de">
<head>
    <!-- charset meta tag -->
    <meta charset="UTF-8">

    <!-- page title -->
    <title>Nachhilfe / <?php echo $page_list[$page]['name']; ?></title>

    <!-- important meta tags -->
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="<?php echo $page_list[$page]['description']; ?>">
    <meta name="keywords" content="Nachhilfe, Rumpfhuber, Bildung, Schüler">
    <meta name="author" content="Clemens Rumpfhuber">

    <!-- geo meta tags -->
    <meta name="DC.title" content="HTL Wels" />
    <meta name="geo.region" content="AT-4" />
    <meta name="geo.placename" content="Wels" />
    <meta name="geo.position" content="48.157632;14.030404" />
    <meta name="ICBM" content="48.157632, 14.030404" />

    <!-- include jQuery (required for materialize.js) -->
    <script type="text/javascript" src="/assets/jquery.js"></script>

    <!-- include materialize framework -->
    <link href="/assets/materialize.min.css" rel="stylesheet">
    <link href="/assets/material-icons.css" rel="stylesheet">
    <script src="/assets/materialize.min.js"></script>

    <!-- include own style sheet -->
    <link href="/assets/style.css" rel="stylesheet">

    <!-- favicon -->
    <link rel="apple-touch-icon" sizes="57x57" href="/assets/favicon/apple-icon-57x57.png">
    <link rel="apple-touch-icon" sizes="60x60" href="/assets/favicon/apple-icon-60x60.png">
    <link rel="apple-touch-icon" sizes="72x72" href="/assets/favicon/apple-icon-72x72.png">
    <link rel="apple-touch-icon" sizes="76x76" href="/assets/favicon/apple-icon-76x76.png">
    <link rel="apple-touch-icon" sizes="114x114" href="/assets/favicon/apple-icon-114x114.png">
    <link rel="apple-touch-icon" sizes="120x120" href="/assets/favicon/apple-icon-120x120.png">
    <link rel="apple-touch-icon" sizes="144x144" href="/assets/favicon/apple-icon-144x144.png">
    <link rel="apple-touch-icon" sizes="152x152" href="/assets/favicon/apple-icon-152x152.png">
    <link rel="apple-touch-icon" sizes="180x180" href="/assets/favicon/apple-icon-180x180.png">
    <link rel="icon" type="image/png" sizes="192x192"  href="/assets/favicon/android-icon-192x192.png">
    <link rel="icon" type="image/png" sizes="32x32" href="/assets/favicon/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="96x96" href="/assets/favicon/favicon-96x96.png">
    <link rel="icon" type="image/png" sizes="16x16" href="/assets/favicon/favicon-16x16.png">
    <link rel="manifest" href="/assets/favicon/manifest.json">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="msapplication-TileImage" content="/assets/favicon/ms-icon-144x144.png">
    <meta name="theme-color" content="#ffffff">
</head>
<body>

<?php // if user is authenticated print the admin dropdown
if (isset($_SESSION['user_id'])) { ?>
    <ul id="admin-dropdown" class="dropdown-content">
        <li><a href="/admin-dashboard"><?php echo $_SESSION['firstname'] . ' ' . $_SESSION['lastname']; ?></a></li>
        <li class="divider"></li>
        <li><a href="/admin-users">Benutzerverwaltung</a></li>
        <li><a href="/admin-files">Dateimanager</a></li>
        <li><a href="/admin-news">News</a></li>
        <li><a href="/admin-information">Informationsmaterial</a></li>
        <li><a href="/admin-download">Downloadbereich</a></li>
        <li><a href="/admin-rating">Bewertungen</a></li>
        <li><a href="/admin-contact">Kontaktanfragen</a></li>
        <li class="divider"></li>
        <li><a href="/logout">Abmelden</a></li>
    </ul>
<?php } ?>

<nav>
    <div class="nav-wrapper blue lighten-1">
        <a href="/home" class="brand-logo" style="margin-left: 10px;">Nachhilfe Rumpfhuber</a>
        <ul class="right hide-on-med-and-down">
            <li><a href="/home">Startseite</a></li>
            <li><a href="/news">Aktuelles</a></li>
            <li><a href="/information">Infobereich</a></li>
            <li><a href="/download">Downloadbereich</a></li>
            <li><a href="/rating">Bewertungen</a></li>
            <li><a href="/contact">Kontaktanfrage</a></li>
            <?php // if user is authenticated print the navbar item
            if (isset($_SESSION['user_id'])) { ?>
                <li><a class="dropdown-trigger  red accent-1" href="#" data-target="admin-dropdown">Webmaster Bereich<i class="material-icons right">arrow_drop_down</i></a></li>
            <?php } ?>
        </ul>
    </div>
</nav>

<div class="container main-container">

    <h3 class="center-align"><?php echo $page_list[$page]['name']; // print the page name as header ?></h3>

    <?php include 'pages/' . $page . '.php'; // include the requested file ?>

</div>

<footer class="page-footer blue lighten-1">
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
                    <li><a class="grey-text text-lighten-3" href="/sitemap">Sitemap</a></li>
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

<script>
    // initialise navbar dropdown
    $( document ).ready(function() {
        $(".dropdown-trigger").dropdown();
    });
</script>

</body>
</html>