<?php

$servername = "bb-db";
$username = "bb-labs-user";
$password = "bb-labs-password";
$dbname = "bb-labs";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
