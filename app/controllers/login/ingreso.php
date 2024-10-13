<?php
// Iniciar la sesión al principio
session_start();

// Incluir el archivo de configuración
include('../../config.php');

// Recibir las credenciales del formulario
$correo = $_POST['correo'];
$contrasena = $_POST['contrasena'];

// Inicializar contador de usuarios
$contador = 0;

// Preparar y ejecutar la consulta
$sql = "SELECT * FROM tbusuario WHERE CorreoUsuario = :correo";
$query = $pdo->prepare($sql);
$query->bindParam(':correo', $correo, PDO::PARAM_STR);
$query->execute();
$usuarios = $query->fetchAll(PDO::FETCH_ASSOC);

// Procesar los resultados de la consulta
foreach ($usuarios as $usuario) {
    $contador++;
    $correo_tabla = $usuario['CorreoUsuario'];
    $nombres = $usuario['NombreUsuario'];
    $contrasena_tabla = $usuario['ContrasenaUsuario'];
}

// Validar las credenciales del usuario
if (($contador > 0) && password_verify($contrasena, $contrasena_tabla)) {
    // Credenciales válidas
    $_SESSION['sesion_correo'] = $correo;
    $_SESSION['nombre_usuario'] = $nombres;

    // Redirigir al sistema
    //    header('Location: http://localhost/sistemaGO/index.php');
    header('Location: ' . $URL . '/'); // 
    exit();  // Detener la ejecución después de la redirección
} else {
    // Credenciales incorrectas
    $_SESSION['mensaje'] = "Las credenciales no son válidas. Inténtelo de nuevo.";

    // Redirigir al formulario de login
    header('Location: ' . $URL . '/login');
    exit();  // Detener la ejecución después de la redirección
}
