<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <link rel="stylesheet" type="text/css" href="https://daeera.neocities.org/signs/style.css">
    <title>Admin</title>
</head>
<body>
    <div class="container">
        <h1 >Bienvenido, administrador.</h1>
        <h3>Aqui puedes gestionar los permisos de todos los usuarios registrados.<h3>
</div>
    
    <?php 
    include("mostrar_regis.php")
    ?>
    <div class="container">
        <form action='cerrar_sesion.php' method='POST'>
            <div class="row justify-content-center">
                <div class="offset-3 col-6 mb-3">
                    <button class="btn btn-primary" type='submit' name='logout' id="botonsubmit">Salir</button>
</div><!--button
</div><!--row-->
            
        </form>
    </div>
</body>
</html>