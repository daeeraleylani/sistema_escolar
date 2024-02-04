<?php
session_start();
session_destroy();
header("Location: http://localhost/conexion_php/login.html");
?>