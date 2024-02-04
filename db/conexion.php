<?php
   include("config.php");
   class ConexionBD{
    //Atributo
    private $con=null;


    //Metodos o funciones de la clase

    public function get_conecction(){
        $this->con = new mysqli(DB_HOST,DB_USER,DB_PASSWORD,DB_NAME);
        if($this->con->connect_error){
            die("Error al conectar con MySQL". $this->con->connect_error);
        }else{
            return $this->con;
            
        }

    }

  }

?>