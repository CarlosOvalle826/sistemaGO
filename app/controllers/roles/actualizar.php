<?php
include('../../config.php');
//Declaración de variables para los campos recibidos
$IdRol = $_POST['IdRol'];
$Rol = $_POST['Rol'];

//ejecutar sentencia SQL para actualizar un nuevo usuario
$sentencia = $pdo->prepare("UPDATE tbrol
        SET Rol=:Rol,
        FechaActualizacion=:FechaActualizacion WHERE IdRol = :IdRol");
//Creación de parametros para tomar los valores de las variables
$sentencia->bindParam('Rol', $Rol);
$sentencia->bindParam('FechaActualizacion', $FechaHora);
$sentencia->bindParam('IdRol', $IdRol);
//validar la actualziación del rol
if ($sentencia->execute()) {
    session_start();
    $_SESSION['mensaje'] = "Rol actualizado correctamente";
    $_SESSION['icono'] = "success";
    header('Location:' . $URL . '/roles/');
} else {
    session_start();
    $_SESSION['mensaje'] = "Error, no se pudo actualizar";
    $_SESSION['icono'] = "error";
    header('Location:' . $URL . '/roles/actualizar.php?id=' . $IdRol);
}
