<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <style>
        body{
            background-color: black;
        }
    </style>
</head>
<body>
    <div>
    <title>Admin</title>
    </div>
    <br>
    <div class="container">
    <?php
        $inc = include("conexion_admin.php");
        if ($inc){
            $consulta = "SELECT c_usuario, c_contrasena, rol FROM tbl_usuario";
            $resultado = mysqli_query($conex, $consulta);
            if($resultado){
               
                echo "<table class='table table-hover table-light  table-bordered  table-striped'";

                
                echo "<tr><th>Usuario</th><th>Rol</th><th>Asignar/Cambiar rol</th></tr>";
                while($row = $resultado->fetch_array()){
                    $usuario = $row['c_usuario'];
                    
                    $rol = $row['rol'];
                    echo "<tr>";
                    echo "<td>$usuario</td><td>$rol</td>";
                    echo "<td><form method='post' action='actualizar_rol.php'>";
                    echo "<input type='hidden' name='usuario' value='$usuario'>";
                    echo "<select name='nuevo_rol'>";
                    echo "<option value='administrador'>Administrador</option>";
                    echo "<option value='finanzas'>Finanzas</option>";
                    echo "<option value='cliente'>Clientes</option>";
                    echo "</select>";
                    echo "<input type='submit' value='Actualizar' id='botonsubmit'>";
                    echo "</form></td>";
                    echo "</tr>";
                }
                echo "</table>";
            }
        }
    ?>
    </div>
    <br>
    

</body>


