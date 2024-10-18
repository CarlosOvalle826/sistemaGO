<?php
// Verificar si ya hay una sesión activa antes de iniciar una nueva
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
if (isset($_SESSION['sesion_correo'])) {
    // echo "Si existe sesion " . $_SESSION['sesion_correo'];
    $correo_sesion = $_SESSION['sesion_correo'];
    $sql = "SELECT us.IdUsuario as IdUsuario, us.NombreUsuario as NombreUsuario, us.CorreoUsuario as CorreoUsuario, rol.Rol as Rol 
    FROM tbusuario as us INNER JOIN tbrol as rol ON us.IdRol = rol.IdRol WHERE CorreoUsuario='$correo_sesion'";
    $query = $pdo->prepare($sql);
    $query->execute();
    $usuarios = $query->fetchAll(PDO::FETCH_ASSOC);
    foreach ($usuarios as $usuario) {
        $IdUsuarioSesion = $usuario['IdUsuario'];
        $nombre_sesion = $usuario['NombreUsuario'];
        $rol_sesion = $usuario['Rol'];
    }
} else {
    echo "No existe sesion";
    header('Location: ' . $URL . '/login');
}
