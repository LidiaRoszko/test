<?php
/* Die Adressierungsvariablen werden von adressierung.php importiert */
include("adressierung.php");

/* Diese Klasse analysiert die csv */
class Analyser{

    /*
    Die Funktion parseCSV gibt eine Array aus, mit den Elementen aus dem CSV.Datei 
    @@@
	*/
    function parseCSV($pfad){
        $ausgabe = Array();
        $zeilenanzahl = 0;
        $offnen = fopen(WORLD_DATA_PATH, "res"); 
        $lesen = fgetcsv($offnen);
        $lesen_spaltenanzahl = count($lesen);

        if ($offnen == FALSE){
            echo "<p style=\"color: red\"> CSV-Datei existiert nicht. Bitte überprüfen sie Ihre Ordnerstruktur --> res/data/wordl_data_v1.cst </p>";
        }

        else {

            while (($zeile = fgetcsv($offnen)) !== FALSE) {
                $zeile_spaltenanzahl = count($zeile);
                $entry = array_combine($lesen, $zeile);
                $ausgabe[] = $entry;
                $zeilenanzahl++;

            }
        }

        fclose($offnen);	
        return $ausgabe;
    } 




    /*
    diese Funktion wandelt die gelesene Daten aus ein csv Datei in einem XML-Array um und schreibt sei alle in einer Zeile.
    Als Rückgabe der Funktion wird der Wert aus dem Standardfunktion von PHP "SimpleXMLElement" ausgegeben.
    Die Werte werden in Temporary gespeichert und erst später in der XML Datei geschrieben
	*/
    function createRawXML($daten){
        $baumwurzel = new SimpleXMLElement('<?xml version="1.0" encoding="UTF-8" ?><Countries></Countries>');

        foreach($daten as $zeile){
            $temporary_country = $baumwurzel->addChild("Country");

            foreach($zeile as $key => $wert){
                $keynamen = $this->getKeyName($key);
                $temporary_wert = $this->trimAll($wert);
                $temporary_country->addChild($keynamen , $temporary_wert);
            }		
        }		
        return $baumwurzel;	
    }

    /*
    Formatierung der XML Datei
    Sie Kopfzeile wird jetzt schon in XML Datei gespeichert
    Quelle: http://php.net/manual/de/domdocument.construct.php
    @@@
	*/
    function formatXML($daten){
        $dom = new DOMDocument('1.0', 'iso-8859-1');
        $dom->preserveWhiteSpace = false;
        $dom->formatOutput = true;
        $dom->loadXML($daten);
        return $dom->saveXML();  /* <?xml version="1.0" encoding="iso-8859-1"?> */
    }

    /*
    alle Key Namen werden erfasst und in temporary gespeichert
	Zusaätzlich für mehr übersicht werden leerzeichen zwischen den hinzugefügt während der Strin zerlegt wird
    Quelle: http://php.net/manual/de/function.strtok.php
	@@@
	*/
    function getKeyName($namen){
        $temporary = $this->trimAll($namen);

        $leerzeichen = strtok($temporary, "   ");
        return $leerzeichen;
    }

    /*
	Die Leerzeichen am Anfang und am Ende der String werden entfernt
    Schließlich werden sie wieder in temporary gespeichert
    Quelle:http://php.net/manual/de/function.ltrim.php
    @@@
	*/
    function trimAll($wert){
        $temporary = ltrim($wert, " ");
        $temporary = rtrim($temporary, " ");
        return $temporary;			
    }

    /*
	Speichern der Daten aus der Funktion createRawXML
    @@@
	*/
    function saveXML($daten){
        $raw_xml = $this->createRawXML($daten);
        $xml = $this->formatXML($raw_xml->asXML());		
        return file_put_contents(XML_PATH, $xml) ==  FALSE ? FALSE : TRUE;
    }

    /*
    nicht formatierte Ausgabe (ohne XSL)
	*/
    
    function printXMLUnstyled($xml_pfad){
        $xml_dom = new DOMDocument();
        $xml_dom->load($xml_pfad);

        /*
        $xsl_dom = new DOMDocument();
        $xsl_dom->load($xsl_pfad);

        $proc = new XSLTProcessor();
        $proc->importStylesheet($xsl_dom);

        $doc = $proc->transformToDOC($xml_dom);
        */
    
        $xml_dom->formatOutput = true;
        return $doc->saveHTML();
    }

    /*
    formatierte Ausgabe (mit XSL)
	*/
    function printXML($xml_pfad, $xsl_pfad){
		$xml_dom = new DOMDocument();
		$xml_dom->load($xml_pfad);

		
		$xsl_dom = new DOMDocument();
		$xsl_dom->load($xsl_pfad);
		
		$proc = new XSLTProcessor();
		$proc->importStylesheet($xsl_dom);
		
		$doc = $proc->transformToDOC($xml_dom);
		$doc->formatOutput = true;
		return $doc->saveHTML();
	}
    
}
?>