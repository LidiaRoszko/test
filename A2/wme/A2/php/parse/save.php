<!DOCTYPE html>
<?php
        include("world_data_parser.php");
?>

<html>
<head>
         <meta charset="UTF-8">
         <meta name="description" content="WME Aufgabe 2 Save">
         <meta name="keywords" content="PHP">
         <meta name="author" content="Sam Toorchi Roodsari">
         <meta name="author" content="Lidia Roszko">

         <title>Aufgabe 2 - Save</title>
</head>
<body>


<?php
        $analyser = new Analyser();
        $fertiganalysiert = $analyser->parseCSV(WORLD_DATA_PATH);
        $speichern = $analyser->saveXML($fertiganalysiert);

        if($speichern == TRUE){
                echo "<p style=\"color: green\">XML Datei wurde erfolgreich gespeichert</p>";
            }
        else {
                echo "<p style=\"color: red\">XML Datei konnte nicht erfolgreich gespeichert werden. Bitte ueberpruefen sie die Lese- und Schreibrechte der Ordner //ausgabe// </p>";
            }
?>


</body>
</html>