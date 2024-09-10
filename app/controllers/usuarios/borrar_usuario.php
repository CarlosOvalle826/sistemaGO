<?php
include('../../config.php');
//Declaración de variables para los campos recibidos
$IdUsuario = $_POST['IdUsuario'];
//ejecutar sentencia SQL para actualizar un nuevo usuario
$sentencia = $pdo->prepare("DELETE FROM tbusuario WHERE IdUsuario = :IdUsuario");
//Creación de parametros para tomar los valores de las variables
$sentencia->bindParam('IdUsuario', $IdUsuario);
$sentencia->execute();
session_start();
$_SESSION['mensaje'] = "¡Usuario eliminado!";
$_SESSION['icono'] = "success";
header('Location:' . $URL . '/usuarios/');
