<?php
include('../../config.php');
//campos recibidos
$nombre_categoria = $_GET['nombre_categoria'];
//ejecutar sentencia SQL para ingresar un nuevo usuario
$sentencia = $pdo->prepare("INSERT INTO tbcategoria
    (NombreCategoria, FechaCreacion) 
    VALUES 
    (:NombreCategoria, :FechaCreacion)");
$sentencia->bindParam('NombreCategoria', $nombre_categoria);
$sentencia->bindParam('FechaCreacion', $FechaHora);
if ($sentencia->execute()) {
    session_start();
    $_SESSION['mensaje'] = "Categoría registrada correctamente";
    $_SESSION['icono'] = "success";
    //header('Location:' . $URL . '/categorias/');
?>
    <script>
        location.href = "<?php echo $URL; ?>/categorias";
    </script>
<?php
} else {
    session_start();
    $_SESSION['mensaje'] = "Error, no se pudo registrar la categoría";
    $_SESSION['icono'] = "error";
    //header('Location:' . $URL . '/categorias/crear.php');
?>
    <script>
        location.href = "<?php echo $URL; ?>/categorias";
    </script>
<?php
}
