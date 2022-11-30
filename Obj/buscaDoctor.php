<?php
    if(isset($_POST["cedula"])){
        include "Conexion.php";
        
        $cedula = $_POST["cedula"];
        $query = "SELECT nombre_comp from doctores where cedula = $cedula";
        $respuesta = mysqli_query($conex, $query);
        $respuesta = mysqli_fetch_array($respuesta);
        
        $respuesta = json_encode($respuesta);
        echo $respuesta;

    }

?>