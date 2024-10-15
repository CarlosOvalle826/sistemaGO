<?php
// Conexión a la base de datos (asume que ya tienes una conexión PDO configurada)
require_once '../../config.php';

if (isset($_POST['IdVenta'])) {
    $idVenta = $_POST['IdVenta'];

    try {
        // Iniciar la transacción
        $pdo->beginTransaction();

        // 1. Obtener el estado actual de la venta
        $stmt = $pdo->prepare("SELECT Estado FROM tbventa WHERE IdVenta = :idVenta");
        $stmt->bindParam(':idVenta', $idVenta, PDO::PARAM_INT);
        $stmt->execute();
        $venta = $stmt->fetch(PDO::FETCH_ASSOC);

        if (!$venta) {
            // Si la venta no existe
            echo json_encode(['success' => false, 'message' => 'Venta no encontrada.']);
        } else {
            $estadoActual = $venta['Estado'];

            // 2. Validar el estado de la venta
            if ($estadoActual === 'CANCELADA') {
                // Si la venta ya está cancelada
                echo json_encode(['success' => false, 'message' => 'Esta venta ya está cancelada.']);
            } elseif ($estadoActual === 'COMPLETADA') {
                // Si la venta está completada, proceder a la cancelación

                // 3. Obtener los carritos asociados a la venta que estén completados
                $stmt = $pdo->prepare("SELECT IdCarrito, IdProducto, Cantidad FROM tbcarrito WHERE IdVenta = :idVenta AND Estado = 'COMPLETADA'");
                $stmt->bindParam(':idVenta', $idVenta, PDO::PARAM_INT);
                $stmt->execute();
                $carritosCompletados = $stmt->fetchAll(PDO::FETCH_ASSOC);

                // 4. Actualizar el stock solo para los carritos con estado "COMPLETADA"
                foreach ($carritosCompletados as $carrito) {
                    $idProducto = $carrito['IdProducto'];
                    $cantidad = $carrito['Cantidad'];

                    // Aumentar el stock del producto
                    $stmt = $pdo->prepare("UPDATE tbalmacen SET Stock = Stock + :cantidad WHERE IdProducto = :idProducto");
                    $stmt->bindParam(':cantidad', $cantidad, PDO::PARAM_INT);
                    $stmt->bindParam(':idProducto', $idProducto, PDO::PARAM_INT);
                    $stmt->execute();
                }

                // 5. Actualizar el estado de los carritos y la venta a "CANCELADA"
                $stmt = $pdo->prepare("UPDATE tbcarrito SET Estado = 'CANCELADA' WHERE IdVenta = :idVenta AND Estado = 'COMPLETADA'");
                $stmt->bindParam(':idVenta', $idVenta, PDO::PARAM_INT);
                $stmt->execute();

                $stmt = $pdo->prepare("UPDATE tbventa SET Estado = 'CANCELADA' WHERE IdVenta = :idVenta");
                $stmt->bindParam(':idVenta', $idVenta, PDO::PARAM_INT);
                $stmt->execute();

                // Confirmar la transacción
                $pdo->commit();

                // Devolver respuesta exitosa
                echo json_encode(['success' => true, 'message' => 'La venta ha sido cancelada exitosamente y el stock ha sido actualizado para los carritos completados.']);
            } else {
                // Para otros estados que no sean COMPLETADA o CANCELADA
                echo json_encode(['success' => false, 'message' => 'La venta no se puede cancelar en este momento.']);
            }
        }
    } catch (Exception $e) {
        // Si hay un error, revertir la transacción
        $pdo->rollBack();
        echo json_encode(['success' => false, 'message' => 'Error al cancelar la venta: ' . $e->getMessage()]);
    }
} else {
    echo json_encode(['success' => false, 'message' => 'ID de venta no proporcionado.']);
}
