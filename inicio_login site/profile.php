<?php
session_start();
if (!isset($_SESSION["usuario"])) {
    header("Location: login.html");
    exit();
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="css/styles.css">
</head>
<body>

    <!-- Blurred Background -->
    <div class="dashboard-container"></div>

    <!-- Dashboard Content -->
    <div class="dashboard-content">
        <h2>Bienvenido, <?php echo htmlspecialchars($_SESSION["nombre"]); ?> 👋</h2>
        <p>Usuario: <?php echo htmlspecialchars($_SESSION["usuario"]); ?></p>
        <a href="logout.php" class="btn">Cerrar Sesión</a>
    </div>

</body>
</html>
