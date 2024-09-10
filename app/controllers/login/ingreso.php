<?php
include('../../config.php');
$correo = $_POST['correo'];
$contrasena = $_POST['contrasena'];



$contador = 0;
$sql = "SELECT * FROM tbusuario WHERE CorreoUsuario = '$correo'";
$query = $pdo->prepare($sql);
$query->execute();
$usuarios = $query->fetchAll(PDO::FETCH_ASSOC);
foreach ($usuarios as $usuario) {
    $contador = $contador + 1;
    $correo_tabla = $usuario['CorreoUsuario'];
    $nombres = $usuario['NombreUsuario'];
    $contrasena_tabla = $usuario['ContrasenaUsuario'];
}
//validar las credenciales del usuario
if (($contador > 0) && (password_verify($contrasena, $contrasena_tabla))) {
    echo "Credenciales validas";
    session_start();
    $_SESSION['sesion_correo'] = $correo;
    header('Location: ' . $URL . '/index.php');
} else {
    echo "Credenciales incorrectas, vuelva a intenterlo";
    session_start();
    $_SESSION['mensaje'] = "Las credenciales no son validas";
    header('Location:' . $URL . '/login');
}
