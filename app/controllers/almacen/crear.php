<?php
include('../../config.php');
//contenido de la imagen
$Imagen = $_POST['Imagen'];
$NombreArchivo = date('Y-m-d-h-i-s');
$Archivo = $NombreArchivo . "__" . $_FILES['Imagen']['name'];
$Ubicacion = "../../../almacen/img_productos/" . $Archivo;
move_uploaded_file($_FILES['Imagen']['tmp_name'], $Ubicacion);
//Declaración de variables para los campos recibidos
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
// Obtener el último ID autoincremental para generar el código EAN-13
$sql_id = "SELECT MAX(IdProducto) AS max_id FROM tbalmacen";
$resultado = $pdo->prepare($sql_id);
$resultado->execute();

// Obtén solo la primera fila del resultado
$row = $resultado->fetch(PDO::FETCH_ASSOC);

// Si no hay productos, iniciar el número secuencial en 1
$numeroSecuencial = ($row['max_id'] !== null) ? $row['max_id'] + 1 : 1;

// Generar el código EAN-13
$codigoEAN13 = generar_ean13($numeroSecuencial);

//ejecutar sentencia SQL para ingresar un nuevo usuario
$sentencia = $pdo->prepare("INSERT INTO tbalmacen
    (Codigo, Nombre, Descripcion, Stock, StockMinimo, StockMaximo, PrecioCompra, PrecioVenta, PrecioMayorista, FechaIngreso, Imagen, IdUsuario, IdCategoria, FechaCreacion) 
    VALUES 
    (:Codigo, :Nombre, :Descripcion, :Stock, :StockMinimo, :StockMaximo, :PrecioCompra, :PrecioVenta, :PrecioMayorista, :FechaIngreso, :Imagen, :IdUsuario, :IdCategoria, :FechaCreacion)");
$sentencia->bindParam('Codigo', $codigoEAN13);
$sentencia->bindParam('Nombre', $Nombre);
$sentencia->bindParam('Descripcion', $Descripcion);
$sentencia->bindParam('Stock', $Stock);
$sentencia->bindParam('StockMinimo', $StockMinimo);
$sentencia->bindParam('StockMaximo', $StockMaximo);
$sentencia->bindParam('PrecioCompra', $PrecioCompra);
$sentencia->bindParam('PrecioVenta', $PrecioVenta);
$sentencia->bindParam('PrecioMayorista', $PrecioMayorista);
$sentencia->bindParam('FechaIngreso', $FechaIngreso);
$sentencia->bindParam('Imagen', $Archivo);
$sentencia->bindParam('IdUsuario', $IdUsuario);
$sentencia->bindParam('IdCategoria', $IdCategoria);
$sentencia->bindParam('FechaCreacion', $FechaHora);
if ($sentencia->execute()) {
    session_start();
    $_SESSION['mensaje'] = "Producto registrado correctamente";
    $_SESSION['icono'] = "success";
    header('Location:' . $URL . '/almacen/');
} else {
    session_start();
    $_SESSION['mensaje'] = "Error, no se pudo registrar el producto";
    $_SESSION['icono'] = "error";
    header('Location:' . $URL . '/almacen/crear.php');
}
//Ejecución de función - Función para generar el código EAN-13
function generar_ean13($numeroSecuencial)
{
    $codigo = str_pad($numeroSecuencial, 12, '0', STR_PAD_LEFT);
    $sumaImpares = 0;
    $sumaPares = 0;

    for ($i = 0; $i < 12; $i++) {
        if ($i % 2 == 0) {
            $sumaImpares += $codigo[$i];
        } else {
            $sumaPares += $codigo[$i];
        }
    }

    $checksum = (10 - (($sumaImpares + $sumaPares * 3) % 10)) % 10;
    return $codigo . $checksum;
}
