<?php
 
include_once("usuario.php");

$result["mensaje"] = "";
switch($_SERVER["REQUEST_METHOD"]){
    case 'GET':
        if(isset($_GET["id"])){
            //Alumno::get_alumno($_GET["id"]);
            Persona::get_usuario_bd($_GET["id"]);
        } else {
            Persona::get_personas_bd();
        }
        break;
    case 'POST':
        $usuario = $_POST["usuario"];
        $contrasena = $_POST["contrasena"];

        // aqui Validamos los campos del formulario
        if (empty($usuario) || empty($contrasena)) {
            $result["mensaje"] = "Por favor, completa todos los campos.";
            echo json_encode($result);
            break;
        }

        $obj= new Persona();
        $obj->set_usuario($usuario);
        $obj->set_contrasena($contrasena);

        //$obj-> guardar alumnos();

        $msn = $obj->guardar_persona_bd();
        $result["mensaje"]="metodo POST, $msn";
        echo json_encode($result);
        break;
    
}

?>