<?php
// Consulta a la base de datos
$sql_cliente = "SELECT IdCliente, NombreCliente, NitCliente, CelularCliente, CorreoCliente FROM tbcliente";
$query_cliente = $pdo->prepare($sql_cliente);
$query_cliente->execute();

// Obtener los resultados
$datos_clientes = $query_cliente->fetchAll(PDO::FETCH_ASSOC);
