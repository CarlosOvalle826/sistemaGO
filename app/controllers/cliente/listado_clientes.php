<?php
define('ROOT_PATH', dirname(__DIR__, 2)); // Ajusta según tu estructura de directorios
require_once ROOT_PATH . '/config.php';

if (isset($_POST)) {
    try {
        // Consulta a la base de datos
        $sql_cliente = "SELECT IdCliente, NombreCliente, NitCliente, CelularCliente, CorreoCliente FROM tbcliente";
        $query_cliente = $pdo->prepare($sql_cliente);
        $query_cliente->execute();

        // Obtener los resultados
        $datos_clientes = $query_cliente->fetchAll(PDO::FETCH_ASSOC);

        // Respuesta en formato JSON
        echo json_encode($datos_clientes); // Se habilita para retornar los datos

    } catch (Exception $e) {
        // Manejo de errores
        echo json_encode([
            'error' => true,
            'message' => 'Error al obtener los datos de los clientes: ' . $e->getMessage()
        ]);
    }
}
