<?= include(__DIR__ . '/app/config.php'); ?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Acceso Denegado</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f2f2f2;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            color: #333;
        }

        .container {
            text-align: center;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            padding: 30px;
            max-width: 400px;
            width: 100%;
        }

        h1 {
            color: #e74c3c;
            /* Color rojo para el mensaje de error */
        }

        p {
            font-size: 18px;
        }

        .button {
            background-color: #3498db;
            /* Color azul */
            color: white;
            padding: 10px 20px;
            text-decoration: none;
            border-radius: 5px;
            margin-top: 20px;
            display: inline-block;
        }

        .button:hover {
            background-color: #2980b9;
            /* Color azul más oscuro al pasar el ratón */
        }
    </style>
</head>

<body>
    <div class="container">
        <h1>Acceso Denegado</h1>
        <p>Lo sentimos, no tienes permiso para acceder a esta sección.</p>
        <a href="<?= $URL; ?>/" class="button">Regresar a Inicio</a>
    </div>

</body>

</html>