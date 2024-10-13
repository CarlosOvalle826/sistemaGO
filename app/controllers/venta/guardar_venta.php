<?php
include('../../config.php');

// Asegúrate de que la solicitud es POST
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $idCliente = $_POST['idCliente'];
    $totalPagado = $_POST['totalPagado'];
    $productos = $_POST['productos'];

    // Comenzar la transacción
    $pdo->beginTransaction();

    try {
        // Verificar stock para cada producto antes de continuar con la inserción
        foreach ($productos as $producto) {
            $idProducto = $producto['idProducto'];
            $cantidad = $producto['cantidad'];

            // Consultar la cantidad actual en stock
            $sqlStock = "SELECT Stock FROM tbalmacen WHERE IdProducto = :IdProducto";
            $stmtStock = $pdo->prepare($sqlStock);
            $stmtStock->bindParam(':IdProducto', $idProducto, PDO::PARAM_INT);
            $stmtStock->execute();

            $stockActual = $stmtStock->fetchColumn();

            // Validar que el stock sea suficiente
            if ($stockActual === false) {
                throw new Exception("El producto con ID $idProducto no existe en el almacén.");
            }

            if ($stockActual < $cantidad) {
                throw new Exception("No hay suficiente stock para el producto con ID $idProducto. Stock actual: $stockActual, solicitado: $cantidad.");
            }
        }

        // Insertar la venta en la tabla Ventas
        $sqlVenta = "INSERT INTO tbventa (IdCliente, TotalPago, FechaCreacion) VALUES (:IdCliente, :TotalPago, :FechaCreacion)";
        $stmt = $pdo->prepare($sqlVenta);
        $stmt->bindParam(':IdCliente', $idCliente, PDO::PARAM_INT);
        $stmt->bindParam(':TotalPago', $totalPagado, PDO::PARAM_STR);
        $fechaCreacion = $FechaHora;
        $stmt->bindParam(':FechaCreacion', $fechaCreacion, PDO::PARAM_STR);
        $stmt->execute();

        // Obtener el ID de la venta insertada
        $idVenta = $pdo->lastInsertId();

        // Insertar cada producto en tbcarrito y actualizar el stock
        $sqlCarrito = "INSERT INTO tbcarrito (IdVenta, IdProducto, Cantidad, FechaCreacion) VALUES (:IdVenta, :IdProducto, :Cantidad, :FechaCreacion)";
        $sqlActualizarStock = "UPDATE tbalmacen SET Stock = Stock - :Cantidad WHERE IdProducto = :IdProducto";

        foreach ($productos as $producto) {
            $idProducto = $producto['idProducto'];
            $cantidad = $producto['cantidad'];

            // Insertar en la tabla Carrito
            $stmtCarrito = $pdo->prepare($sqlCarrito);
            $stmtCarrito->bindParam(':IdVenta', $idVenta, PDO::PARAM_INT);
            $stmtCarrito->bindParam(':IdProducto', $idProducto, PDO::PARAM_INT);
            $stmtCarrito->bindParam(':Cantidad', $cantidad, PDO::PARAM_INT);
            $stmtCarrito->bindParam(':FechaCreacion', $fechaCreacion, PDO::PARAM_STR);
            $stmtCarrito->execute();

            // Actualizar el stock del producto
            $stmtStock = $pdo->prepare($sqlActualizarStock);
            $stmtStock->bindParam(':Cantidad', $cantidad, PDO::PARAM_INT);
            $stmtStock->bindParam(':IdProducto', $idProducto, PDO::PARAM_INT);
            $stmtStock->execute();
        }

        // Confirmar la transacción
        $pdo->commit();

        // Responder al cliente
        echo json_encode(['success' => true, 'message' => 'Venta guardada exitosamente.']);
    } catch (Exception $e) {
        // Revertir la transacción en caso de error
        $pdo->rollBack();

        // Manejar el error
        echo json_encode(['success' => false, 'message' => 'Error al guardar la venta: ' . $e->getMessage()]);
    }
} else {
    echo json_encode(['success' => false, 'message' => 'Solicitud inválida.']);
}
