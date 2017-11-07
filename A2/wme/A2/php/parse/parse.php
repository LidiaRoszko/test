<!DOCTYPE html>
<?php
include("world_data_parser.php");
?>

<html>
    <head>
        <meta charset="UTF-8">
        <meta name="description" content="WME Aufgabe 2">
        <meta name="keywords" content="PHP">
        <meta name="author" content="Sam Toorchi Roodsari">
        <meta name="author" content="Lidia Roszko">

        <title>Aufgabe 2 - Parse</title>
    </head>
    <body>

        <pre>
<?php

$parser = new Analyser();
$parsedCSV = $parser->parseCSV(WORLD_DATA_PATH);

echo var_dump($parsedCSV);

?>
        </pre>

    </body>
</html>