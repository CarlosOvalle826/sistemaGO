<?php
include('../../config.php');
//Declaración de variables para los campos recibidos
$ID_compra = $_GET['ID_compra'];
$IdProducto = $_GET['IdProducto'];
$NumCompra = $_GET['NumCompra'];
$FechaCompra = $_GET['FechaCompra'];
$IdProveedor = $_GET['IdProveedor'];
$Comprobante = $_GET['Comprobante'];
$IdUsuarioSesion = $_GET['IdUsuarioSesion'];
$PrecioCompraCrear = $_GET['PrecioCompraCrear'];
$CantidadCompra = $_GET['CantidadCompra'];
$StockTotal = $_GET['StockTotal'];
//transacción
$pdo->beginTransaction();
//ejecutar sentencia SQL para ingresar un nueva compra
$sentencia = $pdo->prepare("UPDATE tbcompra SET
IdProducto=:IdProducto,
NumCompra=:NumCompra,
FechaCompra=:FechaCompra,
IdProveedor=:IdProveedor,
Comprobante=:Comprobante,
IdUsuario=:IdUsuarioSesion,
PrecioCompra=:PrecioCompraCrear, 
Cantidad=:CantidadCompra,
FechaActualizacion=:FechaActualizacion WHERE IdCompra=:ID_compra");
$sentencia->bindParam('IdProducto', $IdProducto);
$sentencia->bindParam('NumCompra', $NumCompra);
$sentencia->bindParam('FechaCompra', $FechaCompra);
$sentencia->bindParam('IdProveedor', $IdProveedor);
$sentencia->bindParam('Comprobante', $Comprobante);
$sentencia->bindParam('IdUsuarioSesion', $IdUsuarioSesion);
$sentencia->bindParam('PrecioCompraCrear', $PrecioCompraCrear);
$sentencia->bindParam('CantidadCompra', $CantidadCompra);
$sentencia->bindParam('FechaActualizacion', $FechaHora);
$sentencia->bindParam('ID_compra', $ID_compra);
if ($sentencia->execute()) {
    //actualiza información
    $sentencia = $pdo->prepare("UPDATE tbalmacen SET Stock=:Stock WHERE IdProducto = :IdProducto");
    //Creación de parametros para tomar los valores de las variables
    $sentencia->bindParam('IdProducto', $IdProducto);
    $sentencia->bindParam('Stock', $StockTotal);
    $sentencia->execute();
    $pdo->commit();
    session_start();
    $_SESSION['mensaje'] = "Compra actualizada correctamente";
    $_SESSION['icono'] = "success";
?>
    <script>
        location.href = "<?php echo $URL; ?>/compra";
    </script>
<?php
} else {
    $pdo->rollBack();
    session_start();
    $_SESSION['mensaje'] = "Error, no se pudo actualizar la compra";
    $_SESSION['icono'] = "error";
?>
    <script>
        location.href = "<?php echo $URL; ?>/compra";
    </script>
<?php
}
