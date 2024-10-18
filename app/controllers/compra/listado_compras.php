<?php
$sql_compras = "SELECT *,prod.Codigo as Codigo, prod.Nombre as NombreProducto, prod.Descripcion as Descripcion,prod.Stock as Stock, 
prod.StockMinimo as StockMinimo, prod.StockMaximo as StockMaximo, prod.PrecioCompra as PrecioCompra, prod.PrecioVenta as PrecioVenta, 
prod.PrecioMayorista as PrecioMayorista, prod.FechaIngreso as FechaIngreso, prod.Imagen as Imagen, cat.NombreCategoria as NombreCategoria, 
us.NombreUsuario as NombreUsuario, prov.NombreProveedor as NombreProveedor, prov.Celular as Celular, prov.Empresa as Empresa,
prov.Correo as Correo, prov.Direccion as Direccion, uss.NombreUsuario as NombreUsuarioC, us.NombreUsuario as NombreUsuario,
com.PrecioCompra as PrecioCompraC
FROM tbcompra as com 
INNER JOIN tbalmacen as prod ON com.IdProducto=prod.IdProducto 
INNER JOIN tbcategoria as cat ON cat.IdCategoria=prod.IdCategoria 
INNER JOIN tbusuario as us ON us.IdUsuario = prod.IdUsuario 
INNER JOIN tbusuario as uss ON com.IdUsuario = uss.IdUsuario
INNER JOIN tbproveedor as prov ON com.IdProveedor = prov.IdProveedor
ORDER BY com.IdCompra";
$query_compras = $pdo->prepare($sql_compras);
$query_compras->execute();
$datos_compras = $query_compras->fetchAll(PDO::FETCH_ASSOC);
