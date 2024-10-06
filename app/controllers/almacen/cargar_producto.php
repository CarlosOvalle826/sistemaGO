<?php
$IdProductoGet = $_GET['id'];
$sql_productos = "SELECT *, cat.NombreCategoria as Categoria, u.CorreoUsuario as CorreoUsuario, u.IdUsuario as IdUsuario 
 FROM tbalmacen as a INNER JOIN tbcategoria as cat ON a.IdCategoria = cat.IdCategoria
 INNER JOIN tbusuario as u ON u.IdUsuario = a.IdUsuario WHERE IdProducto='$IdProductoGet'";
$query_productos = $pdo->prepare($sql_productos);
$query_productos->execute();
$datos_productos = $query_productos->fetchAll(PDO::FETCH_ASSOC);
foreach ($datos_productos as $dato_producto) {
    //Declaración de variables para los campos recibidos
    $Codigo = $dato_producto['Codigo'];
    $Nombre = $dato_producto['Nombre'];
    $NombreCategoria = $dato_producto['NombreCategoria'];
    $Stock = $dato_producto['Stock'];
    $StockMinimo = $dato_producto['StockMinimo'];
    $StockMaximo = $dato_producto['StockMaximo'];
    $PrecioCompra = $dato_producto['PrecioCompra'];
    $PrecioVenta = $dato_producto['PrecioVenta'];
    $PrecioMayorista = $dato_producto['PrecioMayorista'];
    $FechaIngreso = $dato_producto['FechaIngreso'];
    $CorreoUsuario = $dato_producto['CorreoUsuario'];
    $IdUsuario = $dato_producto['IdUsuario'];
    $Descripcion = $dato_producto['Descripcion'];
    $Imagen = $dato_producto['Imagen'];
}
