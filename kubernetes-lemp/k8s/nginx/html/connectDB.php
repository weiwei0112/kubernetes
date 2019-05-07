<?php
$host = $_SERVER['HTTP_HOST'];
$servername = mysql;
$username = "root";
$password = "Passwd123";

echo $host;

try {
    $conn = new PDO("mysql:host=$servername;dbname=sys", $username, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "Connected successfully";
    }
catch(PDOException $e)
    {
    echo "Connection failed: " . $e->getMessage();
    }

?>