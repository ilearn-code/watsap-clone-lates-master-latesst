<?php

$hostname     = "localhost";
$username     = "root";
$password     = "";
$databasename = "chat_db";

$conn = new mysqli($hostname, $username, $password, $databasename);

if ($conn->connect_error) {
    die("Unable to Connect database: " . $conn->connect_error);
}
