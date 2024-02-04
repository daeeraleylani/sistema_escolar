<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Finanzas</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <link rel="stylesheet" type="text/css" href="https://daeera.neocities.org/signs/style.css">
</head>

<body>
    <?php
    include_once("login.php");
    session_start();
    if (isset($_SESSION["usuario"])) {
        $nombre_usuario = obtener_nombre_usuario($_SESSION["usuario"]);
        echo "<h1>¡ Qué gusto verte de nuevo, $nombre_usuario ! Ahora mismo estás  en el Área de Finanzas</h1>";
        echo"<img src='https://cdn.discordapp.com/attachments/1119139672925405256/1199610586611335238/bouncy-house-and-speech-bubbles-with-a-dollar-sign-and-a-key.gif?ex=65c32b6b&is=65b0b66b&hm=abf35b200f6f2950355ffb2e0a934be0a7602477e1893ce97db856b9fa57956b&'>";
        echo "<form action='cerrar_sesion.php' method='POST'>";

        echo "<button type='submit' name='logout' class='btn btn-secondary'>Cerrar sesión </button>";

        echo "</form>";
    } else {
        header("Location: login.html");
        exit();
    }
    ?>
</body>
</html>