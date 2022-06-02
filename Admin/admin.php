<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>RFID Türöffner</title>

    <!--Webicon-->
    <link rel="icon" type="image/png" sizes="16x16" href="./images/RFID.png">

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500;600;700;800;900&family=Poppins:wght@200;300;400&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

    <!--ICONSCOUT CDN-->
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v2.1.6/css/unicons.css">

    <!--Stylesheet CSS-->
    <link rel="stylesheet" href="./style.css">

    <!-- JAVASCRIPT -->
    <script src="./pin-login.js"></script>
</head>

<body>

    <!-- NAVBAR -->
    <nav>
        <div class="container nav_container">
            <a href="index.php"><h4>RFID Türöffner</h4></a>
            <ul class="nav_menu">
                <li><a href="index.php">Home</a></li>
            </ul>

        <!-- Mobile Buttons -->
        <button id="open-menu-btn"><i class="uil uil-bars"></i></button>
        <button id="close-menu-btn"><i class="uil uil-multiply"></i></button>

        </div>
    </nav>
    <!-- END OF NAVBAR -->

    
    <!-- Adminseite -->    
    <section class="faqs">
        <h2>Verwaltungsoptionen</h2>
        <div class="container faqs_container">

    <!-- TAGS anlegen / löschen -->
        <article class="faq">
            <div class="faq_icon"></div>
            <div class="question_answer">
                <h4>TAG anlegen oder löschen</h4>
                    <form method="get" action="admin.php">
                        <input type="text" name="tag2" class="btn2"></input>
                        <input type="submit" value="Tag löschen" class="btn2"></input>
                    </form>
                    </br>
                    <form method="get" action="admin.php">
                        <input type="text" name="tag" class="btn"></input>
                        <input type="submit" value="Tag anlegen" class="btn"></input>
                    </form>
                    <br>
                    <button class="btn" onclick="scan();">Tag scannen und anlegen</button></br>
                    <br>
                <p>
                    
                <!-- TAG aus SQL Datenbank entfernen -->
                        <?php
                            $con = new mysqli("localhost", "root", "", "prog2");

                            if($con->connect_error) {
                                die("3");
                            }

                            if (isset($_GET['tag2'])) {
                                $sql = "DELETE FROM tags WHERE TAG = (".$_GET['tag2'].")";
                                $con->query($sql);
                            }

                            $con->close(); 
                        ?>
                <!-- TAG in SQL Datenbank schreiben -->
                        <?php
                            $con = new mysqli("localhost", "root", "", "prog2");

                            if($con->connect_error) {
                                die("3");
                            }

                            if (isset($_GET['tag'])) {
                                $sql = "INSERT INTO tags (TAG) VALUES (".$_GET['tag'].")";
                                $con->query($sql);
                            }

                            //TAG aus SQL Datenbank lesen                
                            $sql = "SELECT * FROM tags";
                            $res = $con->query($sql);

                            if ($res->num_rows > 0) {
                                while($i = $res->fetch_assoc()) {
                                    echo "tag: " . $i["TAG"]."<br>";
                                }
                            }
                            else {
                                echo "Leere Datenbank";
                            }

                            $con->close(); 
                        ?>

                </p>
            </div>
        </article>

    <!-- Testframe -->
        <article class="faq">
            <div class="faq_icon"></div>
            <div class="question_answer">
                <h4>Testframe</h4>
                <button class="btn3" onclick="DBsave();"> 1. Test: in Datenbank schreiben</button></br>
                <button class="btn3" onclick="DBread();"> 2. Test: aus Datenbank lesen</button></br>
                <button class="btn3" onclick="DBSaveRead();"> 3. Test: in Datenbank schreiben + lesen</button></br>
                <button class="btn3" onclick="door();"> 4. Test: Türe öffnen</button></br>
                <button class="btn3" onclick="scan();"> 5. Test: Tag scannen und anlegen</button></br>
                <br>
                <h4>Kommunikationsstatus:</h4> <span id="state"></span><br>
	            <h4>Teststatus:</h4> <span id="teststate"></span><br>

                <script>
                    let testState = 1; // 1 = alles ok!		
                    document.getElementById('state').innerHTML = "ok!";	

                    // ###### Funktion um Schloss zu öffnen --- Anfang ######
                    function door() {
                        callWebpage("http://"+ipmc+"/open");
                        document.getElementById("teststate").innerHTML = "Türe geöffnet";
                        if (document.getElementById('state').innerHTML == "0") {
                            document.getElementById('teststate').innerHTML = "Türe öffnen ok!!";		
                        }
                        else {
                            document.getElementById('teststate').innerHTML = "FEHLER beim Türe öffnen";		
                        }
                    }

                    // ###### Funktion um Tag zu scannen --- Anfang ######
                    function scan() {
                        callWebpage("http://"+ipmc+"/scan");
                    }

                    // ###### Funktion um Datenbank auszulesen --- Anfang ######
                    function DBread() {
                        callWebpage("http://192.168.0.194/Admin/testframe/TestReadData.php"); 
                        document.getElementById('teststate').innerHTML = "Lesen abgeschlossen!! <br> 0: OK <br> 2: falsche TAG Anzahl <br> 4: keine Tags in DB";
                    }

                    // ###### Funktionen um 10 Tags in Datenbank zu speichern --- Anfang ######
                    let countSave;
                    function DBsave() {
                        countSave = 0;
                        document.getElementById('teststate').innerHTML = "Speichern läuft...";
                        saveTenTemps();
                    }
                    function saveTenTemps() {
                        callWebpage("http://192.168.0.194/Admin/testframe/testWriteData.php?tag="+(countSave+1)+"&test=1");
                        document.getElementById('teststate').innerHTML = "Speichern läuft..."+(countSave+1);		
                        countSave++;
                        if (countSave<10) { 
                            setTimeout(saveTenTemps, 500); 
                        }
                        else document.getElementById('teststate').innerHTML = "Speichern fertig!";		
                    }
                    // ###### Funktionen um 10 Tags in Datenbank zu speichern --- Anfang ######

                    // ###### Funktionen um zu speichern und lesen --- Anfang ######
                    let saveReadState = 0;
                    function DBSaveRead() {
                        saveReadState++;
                        if (saveReadState == 1) { // Speichern
                            DBsave();
                            setTimeout(DBSaveRead, 10000); // Warte 10 Sekunden -> dann lesen
                        }
                        if (saveReadState == 2) { // Lesen
                            DBread();
                            setTimeout(DBSaveRead, 2000); // Warte 2 Sekunden -> dann Anwort lesen prüfen
                            document.getElementById('teststate').innerHTML = "Warte auf Antwort vom lesen...";		
                        }
                        if (saveReadState == 3) { // Anwort prüfen
                            if ( document.getElementById('state').innerHTML == "0") {
                                document.getElementById('teststate').innerHTML = "Schreiben + Lesen ok!!";		
                            }
                            else {
                                document.getElementById('teststate').innerHTML = "FEHLER beim Schreiben + Lesen!";		
                            }
                            saveReadState = 0;
                        }
                    }
                    // ###### Funktionen um zu speichern und lesen --- Ende ######

                    // ###### Funktion für Aufruf der Websites --- ANFANG ######
                    function callWebpage(urlI) {
                        let xhr = new XMLHttpRequest();
                        xhr.open("GET", urlI, true);
                        xhr.send();			

                        xhr.onreadystatechange = function() {
                            if (this.readyState == 4 && this.status == 200) {   
                                if (this.responseText!=='') { 
                                    if (this.responseText<0) {
                                        testState = -1; 
                                        console.log("Error: " + this.responseText);
                                        document.getElementById('state').innerHTML = "Error: " + this.responseText;
                                    }
                                    else 
                                        document.getElementById('state').innerHTML = this.responseText;
                                }
                            }
                            else {
                                console.log('timeout');
                            }
                        };
                    }
                    // ###### Funktion für Aufruf der Websites --- ENDE ######

                </script>

            </div>
        </article>

    <!-- PROTOKOLL -->
        <article class="faq">
                <div class="faq_icon"></i></div>
                <div class="question_answer">
                    <h4>Protokoll</h4>
                    <p>
                        <?php
                            //SQL verbinden
                            $con = new mysqli("localhost", "root", "", "prog2");
                            if($con->connect_error) {
                                die("3");
                            }

                            //SQL lesen
                            $sql = "SELECT * FROM protokoll";
                            $res = $con->query($sql);

                            if ($res->num_rows > 0) {
                                while($i = $res->fetch_assoc()) {
                                    echo "tag: " . $i["TAG"] . " ---- Zugang: " . $i["ZUGANG"] . " ---- Datum: " . $i["DATUM"] . "<br>";
                                }
                            }
                            else {
                                echo "Leere Datenbank";
                            }

                            $con->close(); 
                        ?>
                    </p>
                </div>
            </article>

    <!-- Mikrocontroller Status -->
            <article class="faq">
                <div class="faq_icon"></div>
                <div class="question_answer">
                    <h4>Mikrokontroller Status</h4>
                    <input class="btn" type="button" value="Reload Page" onClick="document.location.reload(true)">

                    <!-- Server finden aus Script - Ping Funktionsaufruf an MC -->
                    <p id="STATE"> Suche Mikrocontroller...</p>
                    <p id="MCIP">----</p><br><br>

                        <script>
                        <?php
                            $host= gethostname();
                            $ip = gethostbyname($host);		// Netzwerk-Basis-Adresse
                        ?>

                        let serverIp = "<?php echo $ip ?> ";
                        console.log(serverIp);
                        let ipParts = serverIp.split(".");
                        let ipBase = ipParts[0]+"."+ipParts[1]+"."+ipParts[2]+".";
                        console.log(ipBase);

                        let done = 0;
                        for (let i=1; i<50 && !done; i++) {
                            console.log("check: " + ipBase + i);
                            ping(ipBase + i);
                        }
                        
                        var ipmc = ip;
                        function ping(ip) {
                            // ping auf dem Server aufrufen
                            var xhr = new XMLHttpRequest();

                            xhr.onreadystatechange = function () {
                                console.log(ip+": "+xhr.readyState+" - "+xhr.status+" - "+xhr.responseText);
                                if (xhr.readyState == 4 && xhr.status == 200 ) {
                                    if ( xhr.responseText=="77") {
                                        console.log ("GEFUNDEN!!!" + ip);
                                        document.getElementById("STATE").innerHTML = "Mikrocontroller gefunden an:";
                                        document.getElementById("MCIP").innerHTML = "<a target='blank' href='http://"+ip+"'>"+ip+"</a>";
                                        done = 1;
                                        ipmc = ip;
                                    }
                                }
                            };
                            xhr.timeout = 2000; // Set timeout to 2 seconds
                            xhr.ontimeout = function () {}

                            xhr.open("GET", "http://"+ip+"/ping", true);
                            xhr.send();
                            
                        }
                        </script>
                    <!-- ################################# Ende Serverfinder ######################################### -->

                    <h4>letzter Heartbeat:</h4>
                        <?php
                                $con = new mysqli("localhost", "root", "", "prog2");
                                if($con->connect_error) {
                                    die("4");
                                }

                                //Zeit des letzten Heartbeats aus SQL Datenbank holen und ausgeben
                                $sql = "SELECT TIME FROM heartbeat WHERE ID = 1";
                                $res = $con->query($sql);
                                if ($res->num_rows > 0) {
                                    while($i = $res->fetch_assoc()) {
                                        $lastBeat = $i["TIME"];
                                    }
                                }
                                else {
                                    echo "Leere Datenbank";
                                }

                                $con->close();
                        ?>

                        <p id="Heartbeat"> Suche Heartbeat...</p>
                        <script>
                            let anzahlBeats = "<?php echo $lastBeat?>";
                            document.getElementById("Heartbeat").innerHTML = anzahlBeats;
                        </script>

                </div>
            </article>

            
        </div>
    </section>
    <!-- END OF FAQ -->

    <!-- JAVASCRIPT -->
    <script src="./main.js"></script>
    <!-- END OF JAVASCRIPT -->
    
</body>
</html>