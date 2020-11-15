<?php
error_reporting(0);
date_default_timezone_set('Asia/Jakarta');

$servername = "localhost";
$database = "";
$username = "root";
$password = "";

$conn = mysqli_connect($servername, $username, $password, $database);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
