<?php
require 'conexion.php';
session_start();

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $usuario = trim($_POST['usuario']);
    $password = trim($_POST['password']);

    $stmt = $pdo->prepare("SELECT id, nombre, usuario, contraseña FROM formulario WHERE usuario = ?");
    $stmt->execute([$usuario]);
    $user = $stmt->fetch();

    if ($user && password_verify($password, $user['contraseña'])) {
        session_regenerate_id(true);
        $_SESSION["usuario"] = $user["usuario"];
        $_SESSION["nombre"] = $user["nombre"];
        $_SESSION["id"] = $user["id"];

        header("Location: profile.php");
        exit();
    } else {
        echo "⚠ Usuario o contraseña incorrectos.";
    }
}
?>
