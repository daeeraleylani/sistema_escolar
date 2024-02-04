<?php
include_once("usuario.php");

function iniciar_sesion($usuario, $contrasena) {
    $obj_con = new ConexionBD();
    $conx = $obj_con->get_conecction();
    $sql = "SELECT * FROM tbl_usuario WHERE c_usuario = '$usuario' AND c_contrasena = '$contrasena'";
    $result = $conx->query($sql);
    $num_rows = $result->num_rows;
    if ($num_rows > 0) {
        $fila = $result->fetch_assoc();
        $rol = $fila["rol"];
    } else {
        echo 
        "<script>
            alert('Las credenciales ingresadas son Incorrectas');
            window.location='login.html';
        </script>";
        
        $rol = null;
    }
    $conx->close();
    return $rol;
}

function obtener_nombre_usuario($usuario) {
    $obj_con = new ConexionBD();
    $conx = $obj_con->get_conecction();
    $sql = "SELECT * FROM tbl_usuario WHERE c_usuario = '$usuario'";
    $result = $conx->query($sql);
    $fila = $result->fetch_assoc();
    $nombre_usuario = $fila["c_usuario"];
    $conx->close();
    return $nombre_usuario;
}

if (isset($_POST["login"])) {
    $usuario = $_POST["txtusuarioname"];
    $contrasena = $_POST["pswname"];
    $rol = iniciar_sesion($usuario, $contrasena);
    if ($rol != null) {
        session_start();
        $_SESSION["usuario"] = $usuario;
        $_SESSION["rol"] = $rol;
        if ($rol == "administrador") {
            header("Location: http://localhost/conexion_php/index_admin.php");
        } elseif($rol == "cliente") {
            header("Location: http://localhost/conexion_php/inicio.php");
        }else{
            header("Location: http://localhost/conexion_php/finanzas.php");
        };
        exit();
    } else {
        header("Location: http://localhost/conexion_php/no_rol.php");
       ;
    }
   
    
}

?>
