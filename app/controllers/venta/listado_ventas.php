<?php
$sql_ventas = "SELECT * FROM tbventa";
$query_ventas = $pdo->prepare($sql_ventas);
$query_ventas->execute();
$datos_ventas = $query_ventas->fetchAll(PDO::FETCH_ASSOC);
