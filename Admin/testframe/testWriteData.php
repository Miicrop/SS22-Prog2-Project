<?php
    $con = new mysqli("localhost", "root", "", "prog2");

    if($con->connect_error) {
        die("3");
    }

    if (isset($_GET['tag'])) {
        $sql = "INSERT INTO tags (TAG, TEST) VALUES (".$_GET['tag'].", 1)";
        $con->query($sql);
    }

    $con->close(); 
?>