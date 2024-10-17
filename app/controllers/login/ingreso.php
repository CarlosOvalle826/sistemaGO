<?php
// Iniciar la sesión al principio
session_start();

// Incluir el archivo de configuración
include('../../config.php');

// Recibir las credenciales del formulario
$correo = $_POST['correo'];
$contrasena = $_POST['contrasena'];

// Preparar y ejecutar la consulta
$sql = "SELECT * FROM tbusuario WHERE CorreoUsuario = :correo";
$query = $pdo->prepare($sql);
$query->bindParam(':correo', $correo, PDO::PARAM_STR);
$query->execute();
$usuario = $query->fetch(PDO::FETCH_ASSOC); // Cambiar a fetch para obtener solo un registro

// Validar las credenciales del usuario
if ($usuario && password_verify($contrasena, $usuario['ContrasenaUsuario'])) {
    // Credenciales válidas
    $_SESSION['IdUsuario'] = $usuario['IdUsuario']; // Almacenar el ID de usuario en la sesión
    $_SESSION['sesion_correo'] = $correo;
    $_SESSION['nombre_usuario'] = $usuario['NombreUsuario'];

    // Redirigir al sistema
    header('Location: ' . $URL . '/'); // Cambia esto según la ruta de tu sistema
    exit();  // Detener la ejecución después de la redirección
} else {
    // Credenciales incorrectas
    $_SESSION['mensaje'] = "Las credenciales no son válidas. Inténtelo de nuevo.";

    // Redirigir al formulario de login
    header('Location: ' . $URL . '/login');
    exit();  // Detener la ejecución después de la redirección
}
