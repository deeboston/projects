<?php
// Database connection
$host = "localhost";
$user = "root"; // Change if needed
$password = ""; // Change if needed
$database = "usuarios_db";

$conn = new mysqli($host, $user, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get username from form
$usuario = $_GET["usuario"];

// Prepare query to fetch user details
$sql = "SELECT nombre, correo, usuario FROM usuarios WHERE usuario = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $usuario);
$stmt->execute();
$result = $stmt->get_result();

// Check if user exists
if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    echo "<h2>User Information</h2>";
    echo "Name: " . $row["nombre"] . "<br>";
    echo "Email: " . $row["correo"] . "<br>";
    echo "Username: " . $row["usuario"] . "<br>";
} else {
    echo "User not found.";
}

// Close connection
$stmt->close();
$conn->close();
?>
