<?php
    //SQL verbinden
    $con = new mysqli("localhost", "root", "", "prog2");
    if($con->connect_error) {
        die("3");
    }

    $sql = "SELECT * FROM protokoll";
    $res = $con->query($sql);
    $response = array();

    if ($res->num_rows > 0) {
        while($i = $res->fetch_assoc()) {
            array_push($response, $i);
        }
    }
    else {
        echo "Leere Datenbank";
    }

    $con->close(); 
    header('Content-Type: application/json');
    echo json_encode($response);
?>