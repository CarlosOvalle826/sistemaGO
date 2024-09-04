<?php
$sql_usuario = "SELECT * FROM TbUsuario ";
$query_usuario = $pdo->prepare($sql_usuario);
$query_usuario->execute();
$datos_usuario = $query_usuario->fetchAll(PDO::FETCH_ASSOC);
