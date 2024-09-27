<?php
echo $IdRolGet = $_GET['id'];
$sql_roles = "SELECT * FROM TbRol where IdRol = '$IdRolGet'";
$query_roles = $pdo->prepare($sql_roles);
$query_roles->execute();
$datos_roles = $query_roles->fetchAll(PDO::FETCH_ASSOC);
foreach ($datos_roles as $dato_roles) {
    $rol = $dato_roles['Rol'];
}
