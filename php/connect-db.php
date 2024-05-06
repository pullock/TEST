<?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "test_db";

    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
?>