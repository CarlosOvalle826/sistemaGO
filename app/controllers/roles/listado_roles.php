<?php
$sql_roles = "SELECT * FROM TbRol ";
$query_roles = $pdo->prepare($sql_roles);
$query_roles->execute();
$datos_roles = $query_roles->fetchAll(PDO::FETCH_ASSOC);
