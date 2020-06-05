<?php
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

    <link href="/assets/fontawesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>

    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
</head>
<body>

<nav>
    <div class="nav-wrapper">
        <a href="/home" class="brand-logo">hier logo</a>
        <ul class="right hide-on-med-and-down">
            <li><a href="/home">Startseite</a></li>
            <li><a href="/news">Aktuelles</a></li>
            <li><a href="/information">Infobereich</a></li>
            <li><a href="/download">Downloadbereich</a></li>
            <li><a href="/rating">Bewertungen</a></li>
            <li><a href="/contact">Kontaktanfrage</a></li>
        </ul>
    </div>
</nav>

<div class="container">
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