<?php
$sql_proveedores = "SELECT * FROM tbproveedor ORDER BY IdProveedor ASC";
$query_proveedores = $pdo->prepare($sql_proveedores);
$query_proveedores->execute();
$datos_proveedores = $query_proveedores->fetchAll(PDO::FETCH_ASSOC);
