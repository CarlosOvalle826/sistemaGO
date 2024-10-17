<?php
// Iniciar la sesión si aún no está activa
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// Utilizar __DIR__ para crear una ruta absoluta a config.php
include(__DIR__ . '/../../config.php'); // Asegúrate de que la ruta sea correcta

// Obtener el IdUsuario de la sesión
$idUsuario = $_SESSION['IdUsuario'] ?? null;

if (!$idUsuario) {
    // Si no hay usuario en sesión, redirigir al formulario de login
    header('Location: ' . $URL . '/login');
    exit;
}

// Obtener el rol del usuario desde la base de datos
$stmt = $pdo->prepare("SELECT IdRol FROM tbusuario WHERE IdUsuario = :idUsuario");
$stmt->execute(['idUsuario' => $idUsuario]);
$rol = $stmt->fetchColumn(); // Obtener solo el IdRol

function verificarAcceso($moduloNombre)
{
    global $pdo, $rol;

    // Verificar si el rol tiene acceso al módulo
    $stmt = $pdo->prepare("
        SELECT IdModulo 
        FROM tbrol_modulos 
        WHERE IdRol = :rol 
          AND IdModulo = (SELECT IdModulo FROM tbmodulos WHERE NombreModulo = :moduloNombre)
    ");
    $stmt->execute(['rol' => $rol, 'moduloNombre' => $moduloNombre]);

    // Retornar true si existe el módulo asignado al rol
    return $stmt->fetchColumn() !== false;
}

// Ejemplo de uso:
// Verificar si el usuario tiene acceso al módulo "Ventas"
if (!verificarAcceso('Ventas')) {
    // Si no tiene acceso, redirigir a una página de acceso denegado
    header('Location: ' . $URL . '/acceso_denegado.php');
    exit;
}
