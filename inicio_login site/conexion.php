<?php
$host = "localhost"; 
$dbname = "mi_formulario_db";
$username = "root";
$password = ""; // Change if necessary

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $username, $password, [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,  // Enable error reporting
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,  // Fetch results as associative arrays
        PDO::ATTR_EMULATE_PREPARES => false  // Disable emulated prepares for security
    ]);
} catch (PDOException $e) {
    die("Error de conexión: " . $e->getMessage());
}
?>
