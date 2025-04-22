<?php
session_start();
if (!isset($_SESSION["usuario"])) {
    header("Location: login.html");
    exit();
}
?>

<h1>Bienvenido, <?php echo htmlspecialchars($_SESSION["usuario"]); ?></h1>
<a href="logout.php">Cerrar sesión</a>
