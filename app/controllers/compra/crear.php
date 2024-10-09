<?php
include('../../config.php');
//Declaración de variables para los campos recibidos
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
$sentencia = $pdo->prepare("INSERT INTO tbcompra (IdProducto, NumCompra, FechaCompra, IdProveedor, Comprobante, 
IdUsuario, PrecioCompra, Cantidad, FechaCreacion) 
VALUES (:IdProducto, :NumCompra, :FechaCompra, :IdProveedor, :Comprobante, :IdUsuarioSesion, :PrecioCompraCrear, :CantidadCompra, :FechaCreacion)");
$sentencia->bindParam('IdProducto', $IdProducto);
$sentencia->bindParam('NumCompra', $NumCompra);
$sentencia->bindParam('FechaCompra', $FechaCompra);
$sentencia->bindParam('IdProveedor', $IdProveedor);
$sentencia->bindParam('Comprobante', $Comprobante);
$sentencia->bindParam('IdUsuarioSesion', $IdUsuarioSesion);
$sentencia->bindParam('PrecioCompraCrear', $PrecioCompraCrear);
$sentencia->bindParam('CantidadCompra', $CantidadCompra);
$sentencia->bindParam('FechaCreacion', $FechaHora);
if ($sentencia->execute()) {
    //actualiza información
    $sentencia = $pdo->prepare("UPDATE tbalmacen SET Stock=:Stock WHERE IdProducto = :IdProducto");
    //Creación de parametros para tomar los valores de las variables
    $sentencia->bindParam('IdProducto', $IdProducto);
    $sentencia->bindParam('Stock', $StockTotal);
    $sentencia->execute();
    $pdo->commit();
    session_start();
    $_SESSION['mensaje'] = "Compra registrada correctamente";
    $_SESSION['icono'] = "success";
?>
    <script>
        location.href = "<?php echo $URL; ?>/compra";
    </script>
<?php
} else {
    $pdo->rollBack();
    session_start();
    $_SESSION['mensaje'] = "Error, no se pudo registrar la compra";
    $_SESSION['icono'] = "error";
?>
    <script>
        location.href = "<?php echo $URL; ?>/compra/crear.php";
    </script>
<?php
}
