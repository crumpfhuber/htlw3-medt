<!-- Clemens Rumpfhuber 3AHIT -->
<?php
$termin[] = array('Datum' => 20201208, 'Ort' => "Wels", 'Band' => "Warcraft awakes");
$termin[] = array('Datum' => 20210311, 'Ort' => "Wien", 'Band' => "Monster legends coming");
$termin[] = array('Datum' => 20220628, 'Ort' => "Linz", 'Band' => "Starcraft forever");
$termin[] = array('Datum' => 20220628, 'Ort' => "Graz", 'Band' => "Doom arising");
$termin[] = array('Datum' => 20230628, 'Ort' => "Graz", 'Band' => "Get out of here");

$fp = fopen ( "eventkalender.csv", "w" );
if ($fp != NULL) {
    fwrite($fp, "Datum;Ort;Band\n");
    foreach ($termin as $obj) fwrite($fp, $obj['Datum'] . ";" . $obj['Ort'] . ";" . $obj['Band'] . "\n");
    fclose($fp);
}

if (isset($_GET['sortierung'])) {
    foreach ($termin as $id => $obj) {
        $band[$id] = strtolower($obj['Band'] );
        $ort[$id] = strtolower($obj['Ort'] );
        $datum[$id] = strtolower($obj['Datum'] );
    }
    switch ($_GET['sortierung']) {
        case "datum_up": array_multisort($datum, SORT_ASC, $termin); break;
        case "datum_down": array_multisort($datum, SORT_DESC, $termin); break;
        case "band_up": array_multisort($band, SORT_ASC, $termin); break;
        case "band_down": array_multisort($band, SORT_DESC, $termin); break;
        case "ort_up": array_multisort($ort, SORT_ASC, $termin); break;
        case "ort_down": array_multisort($ort, SORT_DESC, $termin); break;
    }
}

function datum_deutsch($date) {
    $date = str_split($date);
    return $date[6] . $date[7] . '.' . $date[4] . $date[5] . '.' . $date[0] . $date[1] . $date[2] . $date[3];
}

function farbwechsel($id) {
    return "row-color-" . ($id % 2 == 0 ? "1" : "2");
}
?>

<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <title>Übung 06 - Terminkalender</title>
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
            width: 50%;
            size: 20pt !important;
        }

        table thead tr td {
            background-color: #0311FC;
            text-align: center;
        }

        .row-color-1 {
            background-color: #4048C9 !important;
        }

        .row-color-2 {
            background-color: #505AFC !important;
        }

        a {
            color: white;
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

<h1>Übung 06 - Terminkalender</h1>

<table>
    <thead>
    <tr>
        <td></td>
        <td>Datum <a href="?sortierung=datum_up">↑</a> <a href="?sortierung=datum_down">↓</a></td>
        <td>Band <a href="?sortierung=band_up">↑</a> <a href="?sortierung=band_down">↓</a></td>
        <td>Ort <a href="?sortierung=ort_up">↑</a> <a href="?sortierung=ort_down">↓</a></td>
    </tr>
    </thead>
    <tbody>
    <?php
    foreach ($termin as $id => $obj)
        echo '<tr class="' . farbwechsel($id) . '"><td>' . ($id + 1) . '.</td><td>' . datum_deutsch($obj['Datum'])  . '</td><td>' . $obj['Band'] . '</td><td>' . $obj['Ort'] . '</td></tr>';
    ?>
    </tbody>
</table>

<footer>&copy; Clemens Rumpfhuber 3AHIT</footer>
</body>
</html>
