<?php
echo $IdUsuarioGet = $_GET['id'];
$sql_usuario = "SELECT us.IdUsuario as IdUsuario, us.NombreUsuario as NombreUsuario, us.CorreoUsuario as CorreoUsuario, rol.Rol as Rol 
FROM tbusuario as us INNER JOIN tbrol as rol ON us.IdRol = rol.IdRol where IdUsuario = '$IdUsuarioGet'";
$query_usuario = $pdo->prepare($sql_usuario);
$query_usuario->execute();
$datos_usuario = $query_usuario->fetchAll(PDO::FETCH_ASSOC);
foreach ($datos_usuario as $dato_usuario) {
    $NombreUsuario = $dato_usuario['NombreUsuario'];
    $CorreoUsuario = $dato_usuario['CorreoUsuario'];
    $Rol = $dato_usuario['Rol'];
}
