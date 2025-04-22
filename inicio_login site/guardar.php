<?php
session_start();
if (!isset($_SESSION['usuario'])) {
    header("Location: login.html");
    exit();
}

include 'db.php'; // Connect to the database

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = $_POST['nombre'];
    $correo = $_POST['correo'];
    $mensaje = $_POST['mensaje'];

    // Insert into database
    $sql = "INSERT INTO formulario (nombre, correo, mensaje) VALUES (?, ?, ?)";
    $stmt = $conexion->prepare($sql);
    $stmt->bind_param("sss", $nombre, $correo, $mensaje);

    if ($stmt->execute()) {
        echo "Mensaje guardado con éxito.";
    } else {
        echo "Error al guardar mensaje: " . $conexion->error;
    }

    $stmt->close();
    $conexion->close();
}
?>
