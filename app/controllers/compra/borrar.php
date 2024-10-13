<?php
include('../../config.php');

$IdCompra = $_GET['IdCompra'];
$IdProducto = $_GET['IdProducto'];
$CantidadCompra = $_GET['CantidadCompra'];
$StockActual = $_GET['StockActual'];
echo $IdCompra . "- - " . $IdProducto . "- - " . $CantidadCompra . "- - " . $StockActual;

$pdo->beginTransaction();

$sentencia = $pdo->prepare("DELETE FROM tbcompra WHERE IdCompra=:IdCompra");

$sentencia->bindParam('IdCompra', $IdCompra);

if ($sentencia->execute()) {
    //actualiza el stock desde la compra
    $Stock = $StockActual - $CantidadCompra;
    $sentencia = $pdo->prepare("UPDATE tbalmacen SET Stock=:Stock WHERE IdProducto = :IdProducto");
    $sentencia->bindParam('Stock', $Stock);
    $sentencia->bindParam('IdProducto', $IdProducto);
    $sentencia->execute();

    $pdo->commit();
    session_start();
    // echo "se registro correctamente";
    $_SESSION['mensaje'] = "Se borro la compra correctamente";
    $_SESSION['icono'] = "success";
    // header('Location: '.$URL.'/categorias/');
?>
    <script>
        location.href = "<?php echo $URL; ?>/compra";
    </script>
<?php
} else {


    $pdo->rollBack();

    session_start();
    $_SESSION['mensaje'] = "Error no se pudo completar la operación";
    $_SESSION['icono'] = "error";
    //  header('Location: '.$URL.'/categorias');
?>
    <script>
        location.href = "<?php echo $URL; ?>/compra";
    </script>
<?php
}
