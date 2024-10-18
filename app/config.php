<?php
// Definir constantes solo si no están ya definidas
if (!defined('SERVIDOR')) {
    define('SERVIDOR', 'localhost');
}

if (!defined('USUARIO')) {
    define('USUARIO', 'root');
}

if (!defined('PASSWORD')) {
    define('PASSWORD', '');
}

if (!defined('BD')) {
    define('BD', 'sistemaventas');
}

$servidor = "mysql:dbname=" . BD . ";host=" . SERVIDOR;

try {
    $pdo = new PDO(
        $servidor,
        USUARIO,
        PASSWORD,
        array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8")
    );
    //echo "Conexión exitosa";
} catch (PDOException $e) {
    //  print_r($e);
    echo "¡Conexión fallida!";
}

$URL = "http://localhost/sistemaGO";

// Configuración de la hora según el país
date_default_timezone_set("America/Guatemala");
$FechaHora = date('Y-m-d H:i:s');
