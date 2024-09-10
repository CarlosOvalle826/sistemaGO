<?php
echo $IdUsuarioGet = $_GET['id'];
$sql_usuario = "SELECT * FROM TbUsuario where IdUsuario = '$IdUsuarioGet'";
$query_usuario = $pdo->prepare($sql_usuario);
$query_usuario->execute();
$datos_usuario = $query_usuario->fetchAll(PDO::FETCH_ASSOC);
foreach ($datos_usuario as $dato_usuario) {
    $NombreUsuario = $dato_usuario['NombreUsuario'];
    $CorreoUsuario = $dato_usuario['CorreoUsuario'];
}
