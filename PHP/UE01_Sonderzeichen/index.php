<!-- Clemens Rumpfhuber 3AHIT -->

<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <title>Übung 01 - Ausgabe mit Sonderzeichen</title>
    <style>
        /* Clemens Rumpfhuber 3AHIT */

        @import url('https://fonts.googleapis.com/css?family=Roboto&display=swap');
        @import url('https://fonts.googleapis.com/css?family=Roboto+Mono&display=swap');

        html {
            height: 100%;
        }

        body {
            margin: 2vw;
            padding-bottom: 2vw;

            font-family: 'Roboto', sans-serif;
            font-size: 14pt;
            line-height: 1.8;

            counter-reset: counter1;
        }

        h1, h2, h3, h4, h5 {
            font-family: 'Roboto Mono', monospace !important;
        }

        h1 {
            text-align: center;
            border: 2px solid black;
        }

        table tbody tr td img {
            width: 200px;
        }

        footer {
            height: 30px;
            width: 100%;
            margin-top: 50px;
            padding: 20px 20px 20px -20px;
        }
    </style>
</head>
<body>

<h1>Übung 01 - Ausgabe mit Sonderzeichen</h1>

<?php
echo "<ul>";
echo "<li>'Xampp' falls noch nicht installiert, installieren.</li>";
echo "<li>Datei schreiben exakt gleich formatiert, wie hier dargestellt.</li>";
echo "<li>Speichern als \"rumpfhuber_ue1_sonderzeichen.php\" im Verzeichnis \\xampp\\htdocs</li>";
echo "<li>Aufruf im Browser mittels http://localhost/rumpfhuber_ue1_sonderzeichen.php oder http://127.0.0.1/rumpfhuber_ue1_sonderzeichen.php</li>";
echo "</ul>";
?>

<footer>
    &copy; Clemens Rumpfhuber 3AHIT
</footer>

</body>
</html>
