<?php
session_start();
if (isset($_SESSION['sesion_correo'])) {
    // echo "Si existe sesion " . $_SESSION['sesion_correo'];
    $correo_sesion = $_SESSION['sesion_correo'];
    $sql = "SELECT * FROM TbUsuario WHERE CorreoUsuario='$correo_sesion'";
    $query = $pdo->prepare($sql);
    $query->execute();
    $usuarios = $query->fetchAll(PDO::FETCH_ASSOC);
    foreach ($usuarios as $usuario) {
        $nombre_sesion = $usuario['NombreUsuario'];
    }
} else {
    echo "No existe sesion";
    header('Location: ' . $URL . '/login');
}
