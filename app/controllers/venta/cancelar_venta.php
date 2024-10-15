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
                // Actualizar el estado de la venta a cancelada
                $stmt = $pdo->prepare("UPDATE tbventa SET Estado = 'CANCELADA' WHERE IdVenta = :idVenta");
                $stmt->bindParam(':idVenta', $idVenta, PDO::PARAM_INT);
                $stmt->execute();

                // Actualizar los registros asociados en la tabla carrito
                $stmt = $pdo->prepare("UPDATE tbcarrito SET Estado = 'CANCELADA' WHERE IdVenta = :idVenta");
                $stmt->bindParam(':idVenta', $idVenta, PDO::PARAM_INT);
                $stmt->execute();

                // Confirmar la transacción
                $pdo->commit();

                // Devolver respuesta exitosa
                echo json_encode(['success' => true, 'message' => 'La venta ha sido cancelada exitosamente.']);
            } else {
                // Para otros estados que pueden ser "pendiente", etc.
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
