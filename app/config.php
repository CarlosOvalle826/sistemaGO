<?php

//definir variables globales
define('SERVIDOR', 'localhost');
define('USUARIO', 'root');
define('PASSWORD', '');
define('BD', 'sistemaventas');

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
