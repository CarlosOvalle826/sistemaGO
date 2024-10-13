<?php
if (isset($_GET['id'])) {
    $IdCompraGet = $_GET['id'];

    // Preparar la consulta SQL
    $sql_compras = "SELECT prod.Codigo as Codigo, 
        prod.IdProducto as IdProducto,
        prod.Nombre as NombreProducto, 
        prod.Descripcion as Descripcion,
        prod.Stock as Stock, 
        prod.StockMinimo as StockMinimo, 
        prod.StockMaximo as StockMaximo, 
        prod.PrecioCompra as PrecioCompra, 
        prod.PrecioVenta as PrecioVenta, 
        prod.PrecioMayorista as PrecioMayorista, 
        prod.FechaIngreso as FechaIngreso, 
        prod.Imagen as Imagen, 
        cat.NombreCategoria as NombreCategoria, 
        us.NombreUsuario as NombreUsuario, 
        prov.IdProveedor as IdProveedor,
        prov.NombreProveedor as NombreProveedor, 
        prov.Celular as Celular, 
        prov.Empresa as Empresa,
        prov.Correo as Correo, 
        prov.Direccion as Direccion,
        uss.NombreUsuario as NombreUsuarioC,
        com.PrecioCompra as PrecioCompraC,
        com.NumCompra as NumCompra,
        com.FechaCompra as FechaCompra,
        com.Comprobante as Comprobante,
        com.Cantidad as Cantidad,
        com.IdCompra as IdCompra
    FROM 
        tbcompra as com 
    INNER JOIN 
        tbalmacen as prod ON com.IdProducto = prod.IdProducto 
    INNER JOIN 
        tbcategoria as cat ON cat.IdCategoria = prod.IdCategoria 
    INNER JOIN 
        tbusuario as us ON us.IdUsuario = prod.IdUsuario 
    INNER JOIN 
        tbusuario as uss ON com.IdUsuario = uss.IdUsuario
    INNER JOIN 
        tbproveedor as prov ON com.IdProveedor = prov.IdProveedor 
    WHERE 
        com.IdCompra = :idCompra"; // Usar un marcador de posición

    // Preparar la consulta
    $query_compras = $pdo->prepare($sql_compras);
    $query_compras->bindParam(':idCompra', $IdCompraGet, PDO::PARAM_INT); // Asociar el parámetro
    $query_compras->execute();

    // Obtener los datos
    $datos_compras = $query_compras->fetchAll(PDO::FETCH_ASSOC);

    // Procesar cada registro
    foreach ($datos_compras as $dato_compra) {
        $IdProductoP = $dato_compra['IdProducto'];
        $IdProveedorP = $dato_compra['IdProveedor'];
        $ID_compra = $dato_compra['IdCompra'];
        // Extraer información del producto
        $CodigoProd = $dato_compra['Codigo'];
        $NombreCategoria = $dato_compra['NombreCategoria'];
        $NombreProducto = $dato_compra['NombreProducto'];
        $Stock = $dato_compra['Stock'];
        $StockMinimo = $dato_compra['StockMinimo'];
        $StockMaximo = $dato_compra['StockMaximo'];
        $PrecioCompra = $dato_compra['PrecioCompra'];
        $PrecioVenta = $dato_compra['PrecioVenta'];
        $PrecioMayorista = $dato_compra['PrecioMayorista'];
        $FechaIngreso = $dato_compra['FechaIngreso'];
        $NombreUsuario = $dato_compra['NombreUsuario'];
        $NombreUsuarioC = $dato_compra['NombreUsuarioC'];
        $Descripcion = $dato_compra['Descripcion'];
        $IMG = $dato_compra['Imagen'];
        $NombreProveedorC = $dato_compra['NombreProveedor'];
        $Celular = $dato_compra['Celular'];
        $Empresa = $dato_compra['Empresa'];
        $Correo = $dato_compra['Correo'];
        $Direccion = $dato_compra['Direccion'];
        $NumCompra = $dato_compra['NumCompra'];
        $FechaCompra = $dato_compra['FechaCompra'];
        $Comprobante = $dato_compra['Comprobante'];
        $PrecioCompraC = $dato_compra['PrecioCompraC'];
        $CantidadCompra = $dato_compra['Cantidad'];

        // Aquí puedes realizar cualquier operación con los datos extraídos
    }
} else {
    echo "ID de compra no especificado.";
}
