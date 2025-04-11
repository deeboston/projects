<?php
$host = 'localhost';
$user = 'root';
$pass = ''; // or your password if you set one
$db   = 'freelancer_site';

$conn = new mysqli($host, $user, $pass, $db);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
