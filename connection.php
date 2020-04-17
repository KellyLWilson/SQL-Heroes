<?php
$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "SQLHeroes";
//Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
//Check conncetion
if ($conn->connect_error) {
    die("connection failed: " . $conn->connect_error);
}
?>