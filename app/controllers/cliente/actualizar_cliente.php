<?php
include('../../config.php');
//Declaración de variables para los campos recibidos
$IdCliente = $_POST['IdCliente'];
$NombreCliente = $_POST['nombre_cliente'];
$NITCliente = $_POST['NIT_cliente'];
$CelularCliente = $_POST['celular_cliente'];
$CorreoCliente = $_POST['correo_cliente'];
//ejecutar sentencia SQL para actualizar un nuevo usuario
$sentencia = $pdo->prepare("UPDATE tbcliente
        SET NombreCliente=:NombreCliente,
        NitCliente=:NitCliente,
        CelularCliente=:CelularCliente,
        CorreoCliente=:CorreoCliente,
        FechaActualizacion=:FechaActualizacion WHERE IdCliente = :IdCliente");
//Creación de parametros para tomar los valores de las variables
$sentencia->bindParam('NombreCliente', $NombreCliente);
$sentencia->bindParam('NitCliente', $NITCliente);
$sentencia->bindParam('CelularCliente', $CelularCliente);
$sentencia->bindParam('CorreoCliente', $CorreoCliente);
$sentencia->bindParam('FechaActualizacion', $FechaHora);
$sentencia->bindParam('IdCliente', $IdCliente);
//validar la actualziación del rol
if ($sentencia->execute()) {
    session_start();
    $_SESSION['mensaje'] = "Cliente actualizado correctamente";
    $_SESSION['icono'] = "success";
    //header('Location:' . $URL . '/categorias/');
?>
    <script>
        location.href = "<?php echo $URL; ?>/cliente";
    </script>
<?php
} else {
    session_start();
    $_SESSION['mensaje'] = "Error, no se pudo actualizar el cliente";
    $_SESSION['icono'] = "error";
    //header('Location:' . $URL . '/categorias/actualizar_categorias.php?id=' . $IdCategoria);
?>
    <script>
        location.href = "<?php echo $URL; ?>/cliente";
    </script>
<?php
}
