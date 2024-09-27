<?php
include('../../config.php');
//Declaración de variables para los campos recibidos
$NombreUsuario = $_POST['NombreUsuario'];
$CorreoUsuario = $_POST['CorreoUsuario'];
$Rol = $_POST['Rol'];
$ContrasenaUsuario = $_POST['ContrasenaUsuario'];
$RepetirContrasena = $_POST['RepetirContrasena'];
//validación de contraseña ingresada
if ($ContrasenaUsuario == $RepetirContrasena) {
    $ContrasenaUsuario = password_hash($ContrasenaUsuario, PASSWORD_DEFAULT);
    //ejecutar sentencia SQL para ingresar un nuevo usuario
    $sentencia = $pdo->prepare("INSERT INTO tbusuario 
    (NombreUsuario, CorreoUsuario, IdRol, ContrasenaUsuario, FechaCreacion) 
    VALUES 
    (:NombreUsuario, :CorreoUsuario, :IdRol, :ContrasenaUsuario, :FechaCreacion)");
    $sentencia->bindParam('NombreUsuario', $NombreUsuario);
    $sentencia->bindParam('CorreoUsuario', $CorreoUsuario);
    $sentencia->bindParam('IdRol', $Rol);
    $sentencia->bindParam('ContrasenaUsuario', $ContrasenaUsuario);
    $sentencia->bindParam('FechaCreacion', $FechaHora);
    $sentencia->execute();
    session_start();
    $_SESSION['mensaje'] = "Usuario registrado correctamente";
    $_SESSION['icono'] = "success";
    header('Location:' . $URL . '/usuarios/');
} else {
    //echo "Las credenciales no son inguales";
    session_start();
    $_SESSION['mensaje'] = "Error, las contraseñas no son iguales";
    $_SESSION['icono'] = "error";
    header('Location:' . $URL . '/usuarios/crear.php');
}
