<?php
$sql_detalles = "SELECT sale.IdVenta as IdVenta, cli.NombreCliente as NombreCliente, sale.TotalPago as TotalPago,
sale.FechaCreacion as FechaCreacion
FROM tbventa as sale 
INNER JOIN tbcliente as cli ON sale.IdCliente=cli.IdCliente";
$query_detalles = $pdo->prepare($sql_detalles);
$query_detalles->execute();
$datos_detalles = $query_detalles->fetchAll(PDO::FETCH_ASSOC);
