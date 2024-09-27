<?php
$sql_usuario = "SELECT us.IdUsuario as IdUsuario, us.NombreUsuario as NombreUsuario, us.CorreoUsuario as CorreoUsuario, rol.Rol as Rol 
FROM tbusuario as us INNER JOIN tbrol as rol ON us.IdRol = rol.IdRol";
$query_usuario = $pdo->prepare($sql_usuario);
$query_usuario->execute();
$datos_usuario = $query_usuario->fetchAll(PDO::FETCH_ASSOC);
