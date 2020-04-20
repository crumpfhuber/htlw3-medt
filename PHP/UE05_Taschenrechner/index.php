<!-- Clemens Rumpfhuber 3AHIT -->
<?php
if (isset($_POST['number_1']) && isset($_POST['number_2']) && isset($_POST['operator']))
    $result = eval('return ' . $_POST['number_1'] . $_POST['operator'] . $_POST['number_2'] . ';');
?>

<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <title>Übung 05 - Taschenrechner</title>
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

        table {
            width: 50%;
            size: 20pt !important;
        }

        table thead tr td {
            background-color: #0311FC;
            text-align: center;
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

        .form-item {
            margin-top: 3vh;
            margin-bottom: 3vh;
        }

        label {
            display: inline-block;
            width: 140px;
            text-align: center;
            font-size: 14pt !important;
        }​

         button {
            text-align: center;
            color: buttontext;
            padding: 1px;
            border: 1px outset buttonface;
            background-color: buttonface;
            size: 13pt !important;
         }

         button,input,select,textarea,optgroup {
             font: inherit;
             size: 13pt !important;
             margin: 0
         }
    </style>
</head>
<body>

<h1>Übung 05 - Taschenrechner</h1>

<form method="post">
    <div>
        <label for="numer_1">Zahl 1</label>
        <input type="number" id="numer_1" name="number_1" autocomplete="off" <?php if(isset($_POST['number_1'])) echo 'value="'. $_POST['number_1'] . '"'; ?> required>
    </div>
    <div class="form-item">
        <label for="operator">Operator</label>
        <select name="operator" id="operator" required>
            <option value="+" <?php if(isset($_POST['operator']) && $_POST['operator'] == "+") echo "selected"; ?>>+</option>
            <option value="-" <?php if(isset($_POST['operator']) && $_POST['operator'] == "-") echo "selected"; ?>>-</option>
            <option value="*" <?php if(isset($_POST['operator']) && $_POST['operator'] == "*") echo "selected"; ?>>*</option>
            <option value="/" <?php if(isset($_POST['operator']) && $_POST['operator'] == "/") echo "selected"; ?>>/</option>
            <option value="%" <?php if(isset($_POST['operator']) && $_POST['operator'] == "%") echo "selected"; ?>>%</option>
        </select>
    </div>
    <div class="form-item">
        <label for="numer_2">Zahl 2</label>
        <input type="number" id="numer_2" name="number_2" autocomplete="off" <?php if(isset($_POST['number_2'])) echo 'value="'. $_POST['number_2'] . '"'; ?> required>
    </div>
    <div class="form-item">
        <label></label>
        <button type="submit">=</button>
    </div>
    <div class="form-item">
        <label for="result">Resultat</label>
        <input type="number" id="result" name="result" readonly <?php if(isset($result)) echo 'value="'. $result . '"'; ?>>
    </div>
    <div class="form-item">
        <!-- es kann sein, dass der browser, den reset button behandelt, daher reloade ich die seite, um die post-eintraege zu löschen -->
        <!-- https://stackoverflow.com/questions/40980932/reset-button-not-working-in-the-form-after-form-submit/40981453 -->
        <button type="reset" onclick="window.location.href = window.location.href">Löschen</button>
    </div>
</form>

<footer>&copy; Clemens Rumpfhuber 3AHIT</footer>
</body>
</html>
