<?php
$sql_cliente = "SELECT * FROM tbcliente";
$query_cliente = $pdo->prepare($sql_cliente);
$query_cliente->execute();
$datos_clientes = $query_cliente->fetchAll(PDO::FETCH_ASSOC);
