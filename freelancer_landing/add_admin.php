<?php
include 'config.php';

$username = "admin";
$password = "boston25"; // Change if you want

$hashed = password_hash($password, PASSWORD_DEFAULT);

$sql = "INSERT INTO admin (username, password) VALUES ('$username', '$hashed')";

if ($conn->query($sql)) {
    echo "✅ Admin user created with hashed password.";
} else {
    echo "❌ Error: " . $conn->error;
}
?>
