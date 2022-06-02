<?php
    /*
    Kommunikationsprotokoll:
    0 = OK
    1 = Zugang gewährt - Öffnen
    2 = Tag wurde nicht von MC übermittelt
    3 = Tag nicht in der Datenbank gefunden
    4 = SQL Datenbank Fehler
    */

    $error = 0;

    //Ist Tag übermittelt worden? Sonst Fehler = 2
    if (isset($_GET["tag"])) {
    }
    else {
        $error = 2;
    }

    //SQL Datenbank öffnen wenn vorhanden
    if ($error == 0) {
        $con = new mysqli("localhost", "root", "", "prog2");

        //SQL Datenbank Fehler = 4
        if($con->connect_error) {
            die("4");
        }

        //Prüfen ob TAG in der Datenbank, wenn ja = 1
        $wert = $_GET["tag"];
        $sql = "SELECT * FROM tags WHERE tag = $wert";

        $res = $con->query($sql);

        if ($res->num_rows > 0) {
            while($i = $res->fetch_assoc()) {
                $error = 1;
            }
            //Zugang gewährt -> Daten in Protokoll Datenbank schreiben
            if (isset($_GET['tag'])) {
                $date = date("Y-m-d H:i:s");
                $sql = "INSERT INTO protokoll (TAG, ZUGANG, DATUM) VALUES (".$_GET['tag'].", 1, '$date' )";
                $con->query($sql);
        }
        }
        
        //wenn TAG nicht gefunden = 3
        else {
            $error = 3;
            //Zugang verweigert - > in Datenbank schreiben
            if (isset($_GET['tag'])) {
                $date = date("Y-m-d H:i:s");
                $sql = "INSERT INTO protokoll (TAG, ZUGANG, DATUM) VALUES (".$_GET['tag'].", 0, '$date' )";
                $con->query($sql);
            }
        }

        $con->close(); 

    //Fehler an Website ausgeben
    echo $error;
    }
?>