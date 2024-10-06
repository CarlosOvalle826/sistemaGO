<?php
include('../../config.php');
//Declaración de variables para los campos recibidos
$IdProducto = $_POST['IdProducto'];
//ejecutar sentencia SQL para actualizar un nuevo usuario
$sentencia = $pdo->prepare("DELETE FROM tbalmacen WHERE IdProducto = :IdProducto");
//Creación de parametros para tomar los valores de las variables
$sentencia->bindParam('IdProducto', $IdProducto);
if ($sentencia->execute()) {
    session_start();
    $_SESSION['mensaje'] = "¡Producto eliminado!";
    $_SESSION['icono'] = "success";
    header('Location:' . $URL . '/almacen/');
} else {
    session_start();
    $_SESSION['mensaje'] = "Error, no se pudo eliminar el registro en la base de datos";
    $_SESSION['icono'] = "error";
    header('Location:' . $URL . '/almacen/borrar.php?id=' . $IdProducto);
}
