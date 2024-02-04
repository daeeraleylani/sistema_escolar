<?php
$inc = include("conexion_admin.php");
if ($inc){
    $usuario = $_POST['usuario'];
    $nuevo_rol = $_POST['nuevo_rol'];

    $consulta = "UPDATE tbl_usuario SET rol = '$nuevo_rol' WHERE c_usuario = '$usuario'";
    $resultado = mysqli_query($conex, $consulta);

    if($resultado){
        echo "<script>setTimeout(function(){window.location.href='index_admin.php';},);</script>";
    } else {
        echo "Error.";
    }
}
?>