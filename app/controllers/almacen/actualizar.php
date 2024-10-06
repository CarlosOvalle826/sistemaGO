<?php
include('../../config.php');
//Declaración de variables para los campos recibidos
$IdProducto = $_POST['IdProducto'];
$Nombre = $_POST['NombreProducto'];
$IdCategoria = $_POST['IdCategoria'];
$Stock = $_POST['Stock'];
$StockMinimo = $_POST['StockMinimo'];
$StockMaximo = $_POST['StockMaximo'];
$PrecioCompra = $_POST['Compra'];
$PrecioVenta = $_POST['Venta'];
$PrecioMayorista = $_POST['Mayorista'];
$FechaIngreso = $_POST['FechaIngreso'];
$IdUsuario = $_POST['IdUsuario'];
$Descripcion = $_POST['Descripcion'];
$TextoImagen = $_POST['TextoImagen'];
//validar imagen
if ($_FILES['Imagen']['name'] != null) {
    // echo "Existe imagen";
    $NombreArchivo = date('Y-m-d-h-i-s');
    $TextoImagen = $NombreArchivo . "__" . $_FILES['Imagen']['name'];
    $Ubicacion = "../../../almacen/img_productos/" . $TextoImagen;
    move_uploaded_file($_FILES['Imagen']['tmp_name'], $Ubicacion);
} else {
    //echo "Imagen no existente";
}
//ejecutar sentencia SQL para actualizar un nuevo usuario
$sentencia = $pdo->prepare("UPDATE tbalmacen
        SET 
        Nombre=:Nombre,
        Descripcion=:Descripcion,
        Stock=:Stock,
        StockMinimo=:StockMinimo,
        StockMaximo=:StockMaximo,
        PrecioCompra=:PrecioCompra,
        PrecioVenta=:PrecioVenta,
        PrecioMayorista=:PrecioMayorista,
        FechaIngreso=:FechaIngreso,
        Imagen=:Imagen,
        IdUsuario=:IdUsuario,
        Idcategoria=:IdCategoria,
        FechaActualizacion=:FechaActualizacion WHERE IdProducto = :IdProducto");
//Creación de parametros para tomar los valores de las variables
$sentencia->bindParam('IdProducto', $IdProducto);
$sentencia->bindParam('Nombre', $Nombre);
$sentencia->bindParam('Descripcion', $Descripcion);
$sentencia->bindParam('Stock', $Stock);
$sentencia->bindParam('StockMinimo', $StockMinimo);
$sentencia->bindParam('StockMaximo', $StockMaximo);
$sentencia->bindParam('PrecioCompra', $PrecioCompra);
$sentencia->bindParam('PrecioVenta', $PrecioVenta);
$sentencia->bindParam('PrecioMayorista', $PrecioMayorista);
$sentencia->bindParam('FechaIngreso', $FechaIngreso);
$sentencia->bindParam('Imagen', $TextoImagen);
$sentencia->bindParam('IdUsuario', $IdUsuario);
$sentencia->bindParam('IdCategoria', $IdCategoria);
$sentencia->bindParam('FechaActualizacion', $FechaHora);

//validar la actualziación del rol
if ($sentencia->execute()) {
    session_start();
    $_SESSION['mensaje'] = "Actualizado correctamente";
    $_SESSION['icono'] = "success";
    header('Location:' . $URL . '/almacen/');
} else {
    session_start();
    $_SESSION['mensaje'] = "Error, no se pudo actualizar";
    $_SESSION['icono'] = "error";
    header('Location:' . $URL . '/almacen/actualizar.php?id=' . $IdProducto);
}
