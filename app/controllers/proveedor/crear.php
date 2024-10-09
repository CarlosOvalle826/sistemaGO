<?php
include('../../config.php');
//campos recibidos
$NombreProveedor = $_GET['nombre_proveedor'];
$Celular = $_GET['celular'];
$Empresa = $_GET['empresa'];
$Correo = $_GET['correo'];
$Direccion = $_GET['direccion'];
//ejecutar sentencia SQL para ingresar un nuevo usuario
$sentencia = $pdo->prepare("INSERT INTO tbproveedor
    (NombreProveedor, Celular, Empresa, Correo, Direccion, FechaCreacion) 
    VALUES 
    (:NombreProveedor, :Celular, :Empresa, :Correo, :Direccion, :FechaCreacion)");
$sentencia->bindParam('NombreProveedor', $NombreProveedor);
$sentencia->bindParam('Celular', $Celular);
$sentencia->bindParam('Empresa', $Empresa);
$sentencia->bindParam('Correo', $Correo);
$sentencia->bindParam('Direccion', $Direccion);
$sentencia->bindParam('FechaCreacion', $FechaHora);
if ($sentencia->execute()) {
    session_start();
    $_SESSION['mensaje'] = "Proveedor registrado correctamente";
    $_SESSION['icono'] = "success";
    //header('Location:' . $URL . '/categorias/');
?>
    <script>
        location.href = "<?php echo $URL; ?>/proveedor";
    </script>
<?php
} else {
    session_start();
    $_SESSION['mensaje'] = "Error, no se pudo registrar el proveedor";
    $_SESSION['icono'] = "error";
    //header('Location:' . $URL . '/categorias/crear.php');
?>
    <script>
        location.href = "<?php echo $URL; ?>/proveedor";
    </script>
<?php
}
