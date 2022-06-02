<?php
error_reporting(E_ERROR); 

$output=false;
if (isset($_GET["output"]) ) $output=true;

if ($output) echo "<html><body><p>Datenbank - Tabelle ausgeben</p>	";

$error = 0;  // alles ok!

// Daten aus Datenbank lesen
$db = new mysqli("localhost", "root", "", "prog2"); 
if ($db->connect_error) {
	if ($output) echo $db->connect_error;
	$error = 1;
}
else {
	if ($output) echo "Datenbankverbindung hergestellt!<br>";

	// SQL 
	$sql = 'SELECT tag, test FROM tags WHERE test=1 ORDER BY tag DESC LIMIT 10';
	if ($output) echo "DB-Abfrage: ".$sql."<br>";

	// sql an Datenbank schicken:
	$result = $db->query($sql);
	if ($result==true) {
		$tagExpected = 10;
		while ($obj = $result->fetch_object()) {
			
			if ($output) echo $obj->tag;
			
			// Prüfen ob Datensatz auch ok ist
			if ($tagExpected!=$obj->tag) {	// Temperatur-Wert
				$error = 2; 
				if ($output) echo "---> FEHLER: ".$tagExpected." erwartet!!";
			}
			$tagExpected--;
			
			if ($output) echo "<br>";
		}
		if ($tagExpected != 0) { $error = 4;}
	}
	else {
		$error = 3;
		if ($output) echo "Lesen fehlgeschlagen!!<br>";

	}
	if ($error) {
		if ($output) echo "Fehler beim Lesen der Datenbank<br>";
	}
	else {
		if ($output) echo "DB-Abfrage-Test ok!<br>";
	}
}
echo $error;

if ($output) echo "</body></html>";


//Test Tags wieder löschen nach lesen um DB sauber zu halten
$sql = "DELETE FROM tags WHERE TEST = 1";
$db->query($sql);

?>
