<!-- Clemens Rumpfhuber 3AHIT -->
<?php
$files = glob('./rumpfhuber_*.{jpg,JPG}', GLOB_BRACE);
?>

<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <title>Übung 07 - Verzeichnisse, Dateien, Array</title>
    <style>
        @import url('https://fonts.googleapis.com/css?family=Roboto&display=swap');
        @import url('https://fonts.googleapis.com/css?family=Roboto+Mono&display=swap');

        html {
            height: 100%;
        }

        body, td {
            margin: 2vw;
            padding-bottom: 2vw;

            font-family: 'Roboto', sans-serif;
            font-size: 14pt !important;
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

        a {
            color: white;
        }

        img {
            width: 300px;
        }

        table {
            width: 75vw;
        }

        td {
            margin: 3px !important;
            text-align: center;
        }

        thead, thead td {
            font-weight: bold;
            margin: 0 !important;
            padding: 0 !important;
        }

        .error {
            color: rgb(255, 59, 48);
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

<h1>Übung 07 - Verzeichnisse, Dateien, Array</h1>

<table>
    <thead>
    <tr>
        <td rowspan="2">Bild</td>
        <td colspan="3">Header Informationen</td>
    </tr>
    <tr>
        <td>Image Title / Comment</td>
        <td>File Name</td>
        <td>Mime Type</td>
    </tr>
    </thead>
    <tbody>
    <?php
    foreach ($files as $id => $file) {
        $header_info = "";
        $header = exif_read_data($file);
        if ($header != NULL) {
            $header_info .= "<td>" . (isset($header['COMMENT']) ? implode("; ", $header['COMMENT']) : '<span class="error">Information not found!</span>') . "</td>";
            $header_info .= "<td>" . (isset($header['FileName']) ? $header['FileName'] : '<span class="error">Information not found!</span>') . "</td>";
            $header_info .=  "<td>" . (isset($header['MimeType']) ? $header['MimeType'] : '<span class="error">Information not found!</span>') . "</td>";
        } else $header_info = '<td colspan="3" class="error">Error: No header information found!</td>';
        echo '<tr><td><a target="_blank" href="'.$file.'"><img src="'.$file.'" alt="Image '.$id.'"></a></td>'.$header_info.'</tr>';
    }
    ?>
    </tbody>
</table>


<footer>&copy; Clemens Rumpfhuber 3AHIT</footer>
</body>
</html>
