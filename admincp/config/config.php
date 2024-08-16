<?php
    $mysqli = new mysqli("localhost:3307","root","","sql_doanweb1");

    // Check connection
    if ($mysqli->connect_errno) {
        echo "Kết nối MySQLi thất bại." . $mysqli->connect_error;
    exit();
    }
?>