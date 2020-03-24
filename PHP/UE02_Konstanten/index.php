<!-- Clemens Rumpfhuber 3AHIT -->
<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <title>Übung 02 - Konstanten</title>
    <style>
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

<h1>Übung 02 - Konstanten</h1>

<?php
const euro_zu_yen = 131.9815;

$gehalt = 2500;
$in_yen = euro_zu_yen * $gehalt;

echo "Gehalt in Euro: " . $gehalt;
echo "<br>Umrechnungskonstante: " . euro_zu_yen;
echo "<br>Gehalt in Yen: " . $in_yen;
?>

<footer>&copy; Clemens Rumpfhuber 3AHIT</footer>
</body>
</html>
