<?php
include('../../config.php');
//Declaración de variables para los campos recibidos
$IdProveedor = $_GET['IdProveedor'];
//ejecutar sentencia SQL para eliminar usuario
$sentencia = $pdo->prepare("DELETE FROM tbproveedor WHERE IdProveedor = :IdProveedor");
//Creación de parametros para tomar los valores de las variables
$sentencia->bindParam('IdProveedor', $IdProveedor);
if ($sentencia->execute()) {
    session_start();
    $_SESSION['mensaje'] = "Proveedor eliminado correctamente";
    $_SESSION['icono'] = "success";
    //header('Location:' . $URL . '/categorias/');
?>
    <script>
        location.href = "<?php echo $URL; ?>/proveedor";
    </script>
<?php
} else {
    session_start();
    $_SESSION['mensaje'] = "Error, no se pudo elminar el proveedor";
    $_SESSION['icono'] = "error";
    //header('Location:' . $URL . '/categorias/crear.php');
?>
    <script>
        location.href = "<?php echo $URL; ?>/proveedor";
    </script>
<?php
}
