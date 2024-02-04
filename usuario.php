<?php
    include("db/conexion.php");
    class Persona{
        /*definir propiedades(properties)*/
        private $usuario;
        private $contraena;

        /*definir metodos(methods)*/
        function set_usuario($usu){
            $this->usuario = $usu;
        }

        function get_usuario(){
            return $this->usuario;
        }

        function set_contrasena($contra){
            $this->contrasena = $contra;
        }

        function get_contrasena(){
            return $this->contrasena;
        }
        public function guardar_persona(){
            $contenido = file_get_contents("data/alumnos.json");
            $usuario=json_decode($contenido, true);
            $usuario[] = array(
                "usuario"=>$this->usuario,
                "contrasena"=>$this->contrasena
            );
            $archivo=fopen("data/alumnos.json","w");
            fwrite($archivo, json_encode($usuario));
            fclose($archivo);

        }
        public static function get_persona($indice){
            $contenido = file_get_contents("data/alumnos.json");
            $usuario = json_decode($contenido);
            echo json_encode($usuario[$indice]);
        }

        public static function get_personas(){
            $contenido = file_get_contents("data/alumnos.json");
            echo $contenido;
        }
        public function actualizar_persona($indice){
            $contenido = file_get_contents("data/alumnos.json");
            $usuarios=json_decode($contenido, true);
            $usu[] = array(
                "usuario"=>$this->usuario,
                "contrasena"=>$this->contrasena
            );
            $usuarios[$indice] = $usu;
            $archivo=fopen("DATA/alumnos.json","w");
            fwrite($archivo, json_encode($usuarios));
            fclose($archivo);
        }
        public static function eliminar_persona($indice){
            $contenido = file_get_contents("data/alumnos.json");
            $usuarios=json_decode($contenido, true);
            array_splice($usuarios, $indice, 1);
            $archivo=fopen("DATA/alumnos.json","w");
            fwrite($archivo, json_encode($usuarios));
            fclose($archivo);   
        }

        public function guardar_persona_bd(){
            $obj_con = new ConexionBD();
            $conx = $obj_con->get_conecction();
            $sql="INSERT INTO tbl_usuario(c_usuario,c_contrasena) VALUES ('$this->usuario','$this->contrasena')";
            if($conx->query($sql) === TRUE){

                header("Location: login.html");
                exit(); 
            }else{
                return "¡ERROR! No se pudo agregar al usuario";
            }
            
            $conx->close();

        }

        public static function eliminar_persona_bd($indice){
            $obj_con = new ConexionBD();
            $conx = $obj_con->get_conecction();
            $sql="DELETE FROM tbl_usuario WHERE c_id=$indice";
            if($conx->query($sql) === TRUE){
                return "Un usuario se ha eliminado";
            }else{
                return "¡ERROR! No se pudo eliminar al usuario";
            }
            $conx->close();
        }


        public function actualizar_persona_bd($indice){
            $obj_con = new ConexionBD();
            $conx = $obj_con->get_conecction();
            $sql="UPDATE tbl_usuario SET c_usuaerio='$this->usuario', c_contrasena='$this->contrasena' WHERE c_id=$indice";
            if($conx->query($sql) === TRUE){
                return "Un usuario se ha actualizado";
            }else{
                return "¡ERROR! No se pudo actualizar";
            }
            $conx->close();
        }

    public static function get_personas_bd(){
            $obj_con = new ConexionBD();
            $conx = $obj_con->get_conecction();
            $sql="SELECT * FROM tbl_usuario";
            $result = $conx->query($sql);
            $registros = array();
            if ($result->num_rows > 0) {
                while($fila = $result->fetch_assoc()){
                    $registros[]=$fila;
                }
                echo json_encode($registros);
            } else {
                echo "No hay registros";
            }
            


            $conx->close();

        }


        public static function get_persona_bd($indice){
            $obj_con = new ConexionBD();
            $conx = $obj_con->get_conecction();
            $sql="SELECT * FROM tbl_usuario WHERE c_id=$indice";
            $result = $conx->query($sql);
            $registros = array();
            if ($result->num_rows > 0) {
                while($fila = $result->fetch_assoc()){
                    $registros[]=$fila;
                }
                echo json_encode($registros);
            } else {
                echo "No hay registros";
            }
            


            $conx->close();

        }
            
        

    } 
?>