<?php
// Conexión a la base de datos (asume que ya tienes una conexión PDO configurada)
require_once '../../config.php';

if (isset($_POST['IdCarrito'])) {
    $idCarrito = $_POST['IdCarrito'];

    try {
        // Iniciar la transacción
        $pdo->beginTransaction();

        // 1. Verificar si el carrito existe
        $stmt = $pdo->prepare("SELECT Estado FROM tbcarrito WHERE IdCarrito = :idCarrito");
        $stmt->bindParam(':idCarrito', $idCarrito, PDO::PARAM_INT);
        $stmt->execute();
        $carrito = $stmt->fetch(PDO::FETCH_ASSOC);

        if (!$carrito) {
            // Si el carrito no existe
            echo json_encode(['success' => false, 'message' => 'Producto no encontrado.']);
        } else {
            $estadoActual = $carrito['Estado'];

            // 2. Validar el estado del carrito
            if ($estadoActual === 'CANCELADA') {
                // Si el carrito ya está cancelado
                echo json_encode(['success' => false, 'message' => 'Este producto ya está cancelado.']);
            } else {
                // 3. Obtener los productos del carrito
                $stmt = $pdo->prepare("SELECT p.IdProducto, p.Stock, c.Cantidad 
                    FROM tbalmacen  AS p
                    INNER JOIN tbcarrito AS c ON p.IdProducto = c.IdProducto
                    WHERE c.IdCarrito = :idCarrito
                ");
                $stmt->bindParam(':idCarrito', $idCarrito, PDO::PARAM_INT);
                $stmt->execute();
                $productos = $stmt->fetchAll(PDO::FETCH_ASSOC);

                // 4. Actualizar el stock de los productos
                foreach ($productos as $producto) {
                    $nuevoStock = $producto['Stock'] + $producto['Cantidad'];
                    $stmt = $pdo->prepare(" UPDATE tbalmacen 
                        SET Stock = :nuevoStock 
                        WHERE IdProducto = :idProducto
                    ");
                    $stmt->bindParam(':nuevoStock', $nuevoStock, PDO::PARAM_INT);
                    $stmt->bindParam(':idProducto', $producto['IdProducto'], PDO::PARAM_INT);
                    $stmt->execute();
                }

                // 5. Actualizar el estado del carrito a cancelado
                $stmt = $pdo->prepare("UPDATE tbcarrito SET Estado = 'CANCELADA' WHERE IdCarrito = :idCarrito");
                $stmt->bindParam(':idCarrito', $idCarrito, PDO::PARAM_INT);
                $stmt->execute();

                // Confirmar la transacción
                $pdo->commit();

                // Devolver respuesta exitosa
                echo json_encode(['success' => true, 'message' => 'El carrito ha sido cancelado exitosamente y el stock actualizado.']);
            }
        }
    } catch (Exception $e) {
        // Si hay un error, revertir la transacción
        $pdo->rollBack();
        echo json_encode(['success' => false, 'message' => 'Error al cancelar el carrito: ' . $e->getMessage()]);
    }
} else {
    echo json_encode(['success' => false, 'message' => 'ID de carrito no proporcionado.']);
}
