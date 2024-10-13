<?php
require_once '../../config.php';
if (isset($_POST['id'])) {
    $ventaID = $_POST['id'];

    // Consulta para obtener los detalles de la venta
    $stmt = $pdo->prepare('SELECT tbc.IdVenta as IdVenta, tbc.IdCarrito as IdCarrito, tba.IdProducto as IdProducto, tba.Nombre as Nombre, tba.Descripcion as Descripcion, tbc.Cantidad as Cantidad,
    tbc.PrecioUnitario as PrecioUnitario FROM tbcarrito as tbc INNER JOIN tbalmacen as tba ON tba.IdProducto=tbc.IdProducto WHERE IdVenta = ?');
    $stmt->execute([$ventaID]);

    // Obtener los resultados
    $ventas = $stmt->fetchAll(PDO::FETCH_ASSOC);

    // Enviar la respuesta como JSON
    echo json_encode($ventas);
}
