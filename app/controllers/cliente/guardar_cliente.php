<?php
include('../../config.php');

// Declaración de variables para los campos recibidos
$NombreCliente = $_POST['NombreCliente'];
$NITCliente = $_POST['NITCliente'];
$CelularCliente = $_POST['CelularCliente'];
$CorreoCliente = $_POST['CorreoCliente'];
// Verificar si los campos obligatorios están vacíos
if (empty($NombreCliente) || empty($NITCliente)) {
    session_start();
    $_SESSION['mensaje'] = "Los campos Nombre Cliente y NIT Cliente son obligatorios";
    $_SESSION['icono'] = "warning"
?>
    <script>
        location.href = "<?php echo $URL; ?>/venta/crear.php";
    </script>
<?php
    exit(); // Detener ejecución aquí
}
// Ejecutar sentencia SQL para ingresar un nuevo cliente
$sentencia = $pdo->prepare("INSERT INTO tbcliente (NombreCliente, NitCliente, CelularCliente, CorreoCliente, FechaCreacion) 
VALUES (:NombreCliente, :NitCliente, :CelularCliente, :CorreoCliente, :FechaCreacion)");
$sentencia->bindParam('NombreCliente', $NombreCliente);
$sentencia->bindParam('NitCliente', $NITCliente);
$sentencia->bindParam('CelularCliente', $CelularCliente);
$sentencia->bindParam('CorreoCliente', $CorreoCliente);
$sentencia->bindParam('FechaCreacion', $FechaHora);

if ($sentencia->execute()) {
    session_start();
    $_SESSION['mensaje'] = "Cliente registrado correctamente";
    $_SESSION['icono'] = "success";
?>
    <script>
        location.href = "<?php echo $URL; ?>/venta/crear.php";
    </script>
<?php
} else {
    session_start();
    $_SESSION['mensaje'] = "Error, no se pudo registrar al cliente";
    $_SESSION['icono'] = "error";
?>
    <script>
        location.href = "<?php echo $URL; ?>/venta/crear.php";
    </script>
<?php
}
?>