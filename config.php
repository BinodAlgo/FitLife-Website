<?php
$servername = "localhost";
$username = "ramawad";
$password = "ramawad#@!";
$dbname = "FitLife";

$mysqli = new mysqli($servername, $username, $password, $dbname);

if ($mysqli->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
