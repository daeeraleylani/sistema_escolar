<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <link rel="stylesheet" type="text/css" href="https://daeera.neocities.org/signs/style.css">
    <title>Bienvenida</title>
</head>

<body>
    <?php
    include_once("login.php");
    session_start();
    if (isset($_SESSION["usuario"])) {
        $nombre_usuario = obtener_nombre_usuario($_SESSION["usuario"]);
        echo "<h1> Bienvenido  $nombre_usuario Estas en el Area de Clientes</h1>";
        echo "<form action='cerrar_sesion.php' method='POST'>";
        echo "<button type='submit' name='logout' class='btn btn-secondary'>Cerrar sesión</button>";
        echo "</form>";
    } else {
        header("Location: login.html");
        exit();
    }
    ?>
</body>
</html>