<!DOCTYPE html>
<?php
        include("world_data_parser.php");
?>

<html>
<head>
         <meta charset="UTF-8">
         <meta name="description" content="WME Aufgabe 2">
         <meta name="keywords" content="PHP">
         <meta name="author" content="">
         <meta name="author" content="">

         <title>Aufgabe 2 - Parse</title>
</head>
<body>

        <pre>
<?php
        $parser = new WorldDataParser();
        $parsedCSV = $parser->parseCSV(WORLD_DATA_PATH);

        echo var_dump($parsedCSV);
?>
        </pre>

</body>
</html>