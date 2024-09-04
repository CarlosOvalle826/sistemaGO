<?php
include('../../config.php');
$correo = $_POST['correo'];
$contrasena = $_POST['contrasena'];

$contador = 0;
$sql = "SELECT * FROM TbUsuario WHERE CorreoUsuario = '$correo' AND ContrasenaUsuario ='$contrasena'";
$query = $pdo->prepare($sql);
$query->execute();
$usuarios = $query->fetchAll(PDO::FETCH_ASSOC);
foreach ($usuarios as $usuario) {
    $contador = $contador = 1;
    $corre_tabla = $usuario['CorreoUsuario'];
    $nombres = $usuario['NombreUsuario'];
}
//validar las credenciales del usuario
if ($contador == 0) {
    echo "Credenciales incorrectas, vuelva a intenterlo";
    session_start();
    $_SESSION['mensaje'] = "Las credenciales no son validas";
    header('Location:' . $URL . '/login');
} else {
    echo "Credenciales validas";
    session_start();
    $_SESSION['sesion_correo'] = $correo;
    header('Location: ' . $URL . '/index.php');
}
