<?php
$servidor = "localhost"; // Servidor MySQL
$usuario = "root"; // Usuario de la base de datos
$contrasena = ""; // Contraseña (dejar vacío si no hay)
$base_datos = "mi_formulario_db"; // Nombre de la base de datos

// Crear conexión
$conexion = new mysqli($servidor, $usuario, $contrasena, $base_datos);

// Verificar conexión
if ($conexion->connect_error) {
    die("Error de conexión: " . $conexion->connect_error);
} 

echo "Conexión exitosa a la base de datos.";
?>
