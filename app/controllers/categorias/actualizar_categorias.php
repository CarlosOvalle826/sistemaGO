<?php
include('../../config.php');
//Declaración de variables para los campos recibidos
$IdCategoria = $_GET['IdCategoria'];
$NombreCategoria = $_GET['nombre_categoria'];
//ejecutar sentencia SQL para actualizar un nuevo usuario
$sentencia = $pdo->prepare("UPDATE tbcategoria
        SET NombreCategoria=:NombreCategoria,
        FechaActualizacion=:FechaActualizacion WHERE IdCategoria = :IdCategoria");
//Creación de parametros para tomar los valores de las variables
$sentencia->bindParam('NombreCategoria', $NombreCategoria);
$sentencia->bindParam('FechaActualizacion', $FechaHora);
$sentencia->bindParam('IdCategoria', $IdCategoria);
//validar la actualziación del rol
if ($sentencia->execute()) {
    session_start();
    $_SESSION['mensaje'] = "Categoría actualizada correctamente";
    $_SESSION['icono'] = "success";
    //header('Location:' . $URL . '/categorias/');
?>
    <script>
        location.href = "<?php echo $URL; ?>/categorias";
    </script>
<?php
} else {
    session_start();
    $_SESSION['mensaje'] = "Error, no se pudo actualizar";
    $_SESSION['icono'] = "error";
    //header('Location:' . $URL . '/categorias/actualizar_categorias.php?id=' . $IdCategoria);
?>
    <script>
        location.href = "<?php echo $URL; ?>/categorias";
    </script>
<?php
}
