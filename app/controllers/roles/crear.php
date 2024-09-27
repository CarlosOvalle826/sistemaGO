<?php
include('../../config.php');
//Declaración de variables para los campos recibidos
$rol = $_POST['Rol'];
//ejecutar sentencia SQL para ingresar un nuevo usuario
$sentencia = $pdo->prepare("INSERT INTO tbrol
    (Rol, FechaCreacion) 
    VALUES 
    (:Rol, :FechaCreacion)");
$sentencia->bindParam('Rol', $rol);
$sentencia->bindParam('FechaCreacion', $FechaHora);
if ($sentencia->execute()) {
    session_start();
    $_SESSION['mensaje'] = "Rol registrado correctamente";
    $_SESSION['icono'] = "success";
    header('Location:' . $URL . '/roles/');
} else {
    session_start();
    $_SESSION['mensaje'] = "Error, no se pudo registrar el Rol";
    $_SESSION['icono'] = "error";
    header('Location:' . $URL . '/roles/crear.php');
}
