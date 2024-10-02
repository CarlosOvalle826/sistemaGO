<?php
$sql_productos = "SELECT *, cat.NombreCategoria as Categoria, u.CorreoUsuario as CorreoUsuario 
 FROM tbalmacen as a INNER JOIN tbcategoria as cat ON a.IdCategoria = cat.IdCategoria
 INNER JOIN tbusuario as u ON u.IdUsuario = a.IdUsuario";
$query_productos = $pdo->prepare($sql_productos);
$query_productos->execute();
$datos_productos = $query_productos->fetchAll(PDO::FETCH_ASSOC);
