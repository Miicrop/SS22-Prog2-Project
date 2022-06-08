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

    <!-- HEADER -->
    <header>
        <div class="container header_container">
            <div class="header_left">
                <h1>Programmieren 2 - Projekt <br>Sommersemester 2022</h1>
                <p>von Niklas Tollmann und Maximilian Berger</p>
                <a href="pinfeld.html" class="btn btn-primary">zur Verwaltungsseite</a>
            </div>

            <div class="header_right">
                <div class="header_right-image"></div>
                <img src="./images/RFIDAufbau.jpg">
            </div>
        </div>
    </header>
    <!-- END OF HEADER -->

    <!-- CATEGORIES -->
    <section class="categories">
        <div class="container categories_container">
            <div class="categories_left">
                <h1>wichtige Themen der Vorlesung</h1>
                <p>Die wichtigsten Themen der Vorlesung sollen im Projekt verankert werden.</p>
                <a href="https://dlp.hs-kempten.de/" class="btn" target="_blank">Learn more -> DLP</a>
            </div>

            <div class="categories_right">
                <article class="category">
                    <span class="category_icon"><i class="uil uil-exchange"></i></span>
                    <h5>Kommunikation</h5>
                    <p>Mikrocontroller, Webserver und Datenbanken sollen miteinander kommunizieren können.</p>
                </article>

                <article class="category">
                    <span class="category_icon"><i class="uil uil-circuit"></i></i></i></span>
                    <h5>Mikrocontroller</h5>
                    <p>Mikrocontroller bietet Möglichkeit für die mechatronische Umsetzung und Datenerzeugung.</p>
                </article>  

                <article class="category">
                    <span class="category_icon"><i class="uil uil-database"></i></i></span>
                    <h5>Datenbanken</h5>
                    <p>Bieten Möglichkeit um sauber und übersichtlich Daten zu speichern und zu lesen.</p>
                </article> 

                <article class="category">
                    <span class="category_icon"><i class="uil uil-user"></i></span>
                    <h5>User Interfaces</h5>
                    <p>Geschickte Verfahren, um User Inputs verarbeiten zu können.</p>
                </article> 

                <article class="category">
                    <span class="category_icon"><i class="uil uil-check"></i></span>
                    <h5>Qualität</h5>
                    <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Aliquid, nesciunt?</p>
                </article>  

                <article class="category">
                    <span class="category_icon"><i class="uil uil-object-ungroup"></i></span>
                    <h5>Objekte</h5>
                    <p>Die Objektorientierung ist ein wesentlicher Bestanteil der Informatik und soll auch im Projekt verankert sein.</p>
                </article>             

            </div>
        </div>
    </section>
    <!-- END OF CATEGORIES -->

    <!-- COURSES -->
    <section class="courses">
        <h2>Hauptthemen</h2>        
        <div class="container courses_container">

            <a href="index.php">
                <article class="course">
                    <div class="course_image">
                        <img src="./images/programming logo.jpg">
                    </div>
                    <div class="course_info">
                        <h4>HTML, CSS, JS</h4>
                        <p> 
                            Die 9 Kapitel der Vorlesung konnten in das Projekt integriert werden.<br><br>
                            HTML, CSS, JS wurde eingesetzt<br>
                            Logfiles wurden erstellt<br>
                            Objektorientierte Programmierung ist eingesetzt worden<br>
                            User Interfaces wurden generiert<br>
                            Android App erstellt
                        </p>
                    </div>
                </article>
            </a>

            <a href="index.php">
                <article class="course">
                    <div class="course_image">
                        <img src="./images/arduino.jpg">
                    </div>
                    <div class="course_info">
                        <h4>Mikrocontroller</h4>
                        <p>
                            Mikrocontroller sind ein wesentlicher Bestandteil des Projekts.<br><br>
                            Beinhaltet sind Themen wie:<br>
                            Simple Multitasking<br>
                            Heartbeat<br>
                            Kommunikation<br>
                        </p>
                    </div>
                </article>
            </a>

            <a href="index.php">
                <article class="course">
                    <div class="course_image">
                        <img src="./images/IOT.png">
                    </div>
                    <div class="course_info">
                        <h4>Kommunikation</h4>
                        <p>
                            Die eingesetzen Technologien können nun miteinander kommunizieren und interagieren<br><br>
                            Mikrocontroller, Website, App und Server können miteinander kommunizieren<br>
                            Mikrocontroller Daten können an Server geschickt und gespeichert werden
                        </p>
                    </div>
                </article>
            </a>

        </div>
    </section>
    <!-- END OF COURSES -->

    <!-- Footer -->
    <footer>
        <div class="container footer_container">

            <div class="footer_1">
                <a href="index.html" class="footer_logo"><h4>RFID Türöffner</h4></a>
                <p>Robotik Programmieren 2 Projekt Sommersemester 2022 <br> Niklas Tollmann und Maximilian Berger</p>
            </div>

            <div class="footer_2">
                <h4>Permalinks</h4>
                <ul>
                    <li><a href="index.php">Home</a></li>
                    <li><a href="pinfeld.html">Adminseite</a></li>
                </ul>
            </div>

            <div class="footer_3">
                <h4>Primacy</h4>
                <ul>
                    <li><a href="#">Privacy Policy</a></li>
                    <li><a href="#">Terms and Conditions</a></li>
                    <li><a href="#">Disclaimer</a></li>
                </ul>
            </div>

            <div class="footer_4">
                <h4>Contact Us</h4>
                <div>
                    <p>0118 999 88199 9119 725 3</p>
                    <p>testmail@testserver.com</p>
                </div>

                <ul class="footer_socials">
                    <li><a href="#"><i class="uil uil-facebook-f"></i></a></li>
                    <li><a href="#"><i class="uil uil-instagram"></i></a></li>
                    <li><a href="#"><i class="uil uil-twitter"></i></a></li>
                    <li><a href="#"><i class="uil uil-linkedin"></i></a></li>
                </ul>
            </div>        

        </div>

        <div class="footer_copyright">
            <small>Copyright &copy;</small>
        </div>

    </footer>
    <!-- END OF Footer -->
    
</body>
</html>