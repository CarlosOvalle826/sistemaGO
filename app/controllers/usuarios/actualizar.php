<?php
include('../../config.php');
//Declaración de variables para los campos recibidos
$NombreUsuario = $_POST['NombreUsuario'];
$CorreoUsuario = $_POST['CorreoUsuario'];
$ContrasenaUsuario = $_POST['ContrasenaUsuario'];
$RepetirContrasena = $_POST['RepetirContrasena'];
$IdUsuario = $_POST['IdUsuario'];
$Rol = $_POST['Rol'];
//validar campos vacios
if ($ContrasenaUsuario == "") {
    //validación de contraseña ingresada
    if ($ContrasenaUsuario == $RepetirContrasena) {
        $ContrasenaUsuario = password_hash($ContrasenaUsuario, PASSWORD_DEFAULT);
        //ejecutar sentencia SQL para actualizar un nuevo usuario
        $sentencia = $pdo->prepare("UPDATE tbusuario 
        SET NombreUsuario=:NombreUsuario,
        CorreoUsuario=:CorreoUsuario,
        IdRol=:IdRol,
        FechaActualizacion=:FechaActualizacion WHERE IdUsuario = :IdUsuario");
        //Creación de parametros para tomar los valores de las variables
        $sentencia->bindParam('NombreUsuario', $NombreUsuario);
        $sentencia->bindParam('CorreoUsuario', $CorreoUsuario);
        $sentencia->bindParam('IdRol', $Rol);
        $sentencia->bindParam('FechaActualizacion', $FechaHora);
        $sentencia->bindParam('IdUsuario', $IdUsuario);
        $sentencia->execute();
        session_start();
        $_SESSION['mensaje'] = "Usuario actualizado correctamente";
        $_SESSION['icono'] = "success";
        header('Location:' . $URL . '/usuarios/');
    } else {
        //echo "Las credenciales no son inguales";
        session_start();
        $_SESSION['mensaje'] = "Error, las contraseñas no son iguales";
        $_SESSION['icono'] = "error";
        header('Location:' . $URL . '/usuarios/actualizar.php?id=' . $IdUsuario);
    }
} else {
    //validación de contraseña ingresada
    if ($ContrasenaUsuario == $RepetirContrasena) {
        $ContrasenaUsuario = password_hash($ContrasenaUsuario, PASSWORD_DEFAULT);
        //ejecutar sentencia SQL para actualizar un nuevo usuario
        $sentencia = $pdo->prepare("UPDATE tbusuario 
        SET NombreUsuario=:NombreUsuario,
        CorreoUsuario=:CorreoUsuario,
        IdRol=:IdRol,
        ContrasenaUsuario=:ContrasenaUsuario,
        FechaActualizacion=:FechaActualizacion WHERE IdUsuario = :IdUsuario");
        //Creación de parametros para tomar los valores de las variables
        $sentencia->bindParam('NombreUsuario', $NombreUsuario);
        $sentencia->bindParam('CorreoUsuario', $CorreoUsuario);
        $sentencia->bindParam('IdRol', $Rol);
        $sentencia->bindParam('ContrasenaUsuario', $ContrasenaUsuario);
        $sentencia->bindParam('FechaActualizacion', $FechaHora);
        $sentencia->bindParam('IdUsuario', $IdUsuario);
        $sentencia->execute();
        session_start();
        $_SESSION['mensaje'] = "Usuario actualizado correctamente";
        $_SESSION['icono'] = "success";
        header('Location:' . $URL . '/usuarios/');
    } else {
        //echo "Las credenciales no son inguales";
        session_start();
        $_SESSION['mensaje'] = "Error, las contraseñas no son iguales";
        $_SESSION['icono'] = "error";
        header('Location:' . $URL . '/usuarios/actualizar.php?id=' . $IdUsuario);
    }
}
