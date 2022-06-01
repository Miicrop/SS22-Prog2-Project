<?php
        $con = new mysqli("localhost", "root", "", "prog2");
        if($con->connect_error) {
            die("4");
        }

        //Zeit des letzten Heartbeats in SQL Datenbank updaten
        $time = date("Y-m-d H:i:s");
        $sql = "UPDATE heartbeat SET TIME='$time' WHERE ID=1";
        $res = $con->query($sql);

        $con->close();
?>

