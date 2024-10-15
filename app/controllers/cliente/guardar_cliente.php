<?php
include('../../config.php');
//campos recibidos
$NombreCliente = $_POST['NombreCliente'];
$NitCliente = $_POST['NITCliente'];
$CelularCliente = $_POST['CelularCliente'];
$CorreoCliente = $_POST['CorreoCliente'];
//ejecutar sentencia SQL para ingresar un cliente
$sentencia = $pdo->prepare("INSERT INTO tbcliente
    (NombreCliente, NitCliente, CelularCliente, CorreoCliente, FechaCreacion) 
    VALUES 
    (:NombreCliente, :NitCliente, :CelularCliente, :CorreoCliente, :FechaCreacion)");
$sentencia->bindParam('NombreCliente', $NombreCliente);
$sentencia->bindParam('NitCliente', $NitCliente);
$sentencia->bindParam('CelularCliente', $CelularCliente);
$sentencia->bindParam('CorreoCliente', $CorreoCliente);
$sentencia->bindParam('FechaCreacion', $FechaHora);
if ($sentencia->execute()) {
    echo json_encode(['success' => true, 'message' => 'Cliente registrado correctamente']);
?>

<?php
} else {
    echo json_encode(['success' => true, 'message' => 'No se pudo registrar al cliente']);
?>
<?php
}
