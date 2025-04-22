<?php
require 'conexion.php';

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $nombre = trim($_POST['nombre']);
    $correo = trim($_POST['correo']);
    $usuario = trim($_POST['usuario']);
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

    $stmt = $pdo->prepare("SELECT COUNT(*) FROM formulario WHERE usuario = ? OR correo = ?");
    $stmt->execute([$usuario, $correo]);
    $userExists = $stmt->fetchColumn();

    if ($userExists) {
        echo "❌ Usuario o correo ya registrado.";
        exit();
    }

    $stmt = $pdo->prepare("INSERT INTO formulario (nombre, correo, usuario, contraseña) VALUES (?, ?, ?, ?)");
    if ($stmt->execute([$nombre, $correo, $usuario, $password])) {
        header("Location: login.html");
    } else {
        echo "❌ Error al registrar.";
    }
}
?>
