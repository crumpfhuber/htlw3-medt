<!-- Clemens Rumpfhuber 3AHIT -->
<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <title>Übung 03 - Preisberechnung</title>
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

            counter-reset: counter1;
        }

        h1, h2, h3, h4, h5 {
            font-family: 'Roboto Mono', monospace !important;
        }

        h1 {
            text-align: center;
            border: 2px solid black;
        }

        table {
            width: 100%;
        }

        table thead tr td {
            background-color: gray;
            text-align: center;
        }

        table tbody tr:nth-child(odd) {
            background-color: #f2f2f2;
        }

        #gesamt td {
            border-top: 5px solid black;
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

<h1>Übung 03 - Preisberechnung</h1>

<?php
const euro_zeichen = "€";

$bez_schreibtisch = "Schreibtisch";
$bez_stuhl = "Stuhl";
$bez_uhr = "Uhr";
$bez_trennwand = "Treenwand";

$preis_schreibtisch = 1999;
$preis_stuhl = 679;
$preis_uhr = 78;
$preis_trennwand = 499;

$preis_brutto_schreibtisch = $preis_schreibtisch * 1.2;
$preis_brutto_stuhl = $preis_stuhl * 1.2;
$preis_brutto_uhr = $preis_uhr * 1.2;
$preis_brutto_trennwand = $preis_trennwand * 1.2;

$anzahl_schreibtisch = 30;
$anzahl_stuhl = 30;
$anzahl_uhr = 1;
$anzahl_trennwand = 20;

$netto_gesamt = $preis_schreibtisch * $anzahl_schreibtisch + $preis_stuhl + $anzahl_stuhl + $preis_uhr + $anzahl_uhr + $preis_trennwand + $anzahl_trennwand;
$brutto_gesamt = $preis_brutto_schreibtisch * $anzahl_schreibtisch + $preis_brutto_stuhl * $anzahl_stuhl + $preis_brutto_uhr * $anzahl_uhr + $preis_brutto_trennwand * $anzahl_trennwand;
?>

<table>
    <thead>
    <tr>
        <td>Variable</td>
        <td>Bezeichnung</td>
        <td>Variable</td>
        <td>Preis (netto)</td>
        <td>Preis (brutto)</td>
        <td>Anzahl</td>
        <td>Gesamt</td>
    </tr>
    </thead>
    <tbody>
    <tr>
        <td><?php echo "\$bez_schreibtisch"; ?></td>
        <td><?php echo $bez_schreibtisch; ?></td>
        <td><?php echo "\$preis_schreibtisch"; ?></td>
        <td><?php echo euro_zeichen . " " . $preis_schreibtisch; ?></td>
        <td><?php echo euro_zeichen . " " . $preis_brutto_schreibtisch; ?></td>
        <td><?php echo $anzahl_schreibtisch; ?></td>
        <td><?php echo euro_zeichen . " " . $anzahl_schreibtisch * $preis_brutto_schreibtisch; ?></td>
    </tr>
    <tr>
        <td><?php echo "\$bez_stuhl"; ?></td>
        <td><?php echo $bez_stuhl; ?></td>
        <td><?php echo "\$preis_stuhl"; ?></td>
        <td><?php echo euro_zeichen . " " . $preis_stuhl; ?></td>
        <td><?php echo euro_zeichen . " " . $preis_brutto_stuhl; ?></td>
        <td><?php echo $anzahl_stuhl; ?></td>
        <td><?php echo euro_zeichen . " " . $anzahl_stuhl * $preis_brutto_stuhl; ?></td>
    </tr>
    <tr>
        <td><?php echo "\$bez_uhr"; ?></td>
        <td><?php echo $bez_uhr; ?></td>
        <td><?php echo "\$preis_schreibtisch"; ?></td>
        <td><?php echo euro_zeichen . " " . $preis_brutto_uhr; ?></td>
        <td><?php echo euro_zeichen . " " . $preis_brutto_uhr; ?></td>
        <td><?php echo $anzahl_uhr; ?></td>
        <td><?php echo euro_zeichen . " " . $anzahl_uhr * $preis_brutto_uhr; ?></td>
    </tr>
    <tr>
        <td><?php echo "\$bez_schreibtisch"; ?></td>
        <td><?php echo $bez_schreibtisch; ?></td>
        <td><?php echo "\$preis_schreibtisch"; ?></td>
        <td><?php echo euro_zeichen . " " . $preis_schreibtisch; ?></td>
        <td><?php echo euro_zeichen . " " . $preis_brutto_schreibtisch; ?></td>
        <td><?php echo $anzahl_trennwand; ?></td>
        <td><?php echo euro_zeichen . " " . $anzahl_trennwand * $preis_brutto_trennwand; ?></td>
    </tr>
    <tr id="gesamt">
        <td></td>
        <td colspan="2" style="text-align: center;">Gesamt (Büro netto)</td>
        <td><?php echo euro_zeichen . " " . number_format($netto_gesamt, 2, '.', ''); ?></td>
        <td colspan="2" style="text-align: center;">Gesamt (Büro brutto)</td>
        <td><?php echo euro_zeichen . " " . number_format($brutto_gesamt, 2, '.', ''); ?></td>
    </tr>
    </tbody>
</table>

<footer>&copy; Clemens Rumpfhuber 3AHIT</footer>
</body>
</html>
