<?php
    function BuscaTel($dato){
        include 'Obj/Conexion.php';
        $sql = "select * from telefonos where idtel = $dato";
        $result = mysqli_query($conex,$sql);
        $row = mysqli_fetch_array($result);
        $tel = $row["telefono"];
        return $tel;
    }
    
    function BuscaDire($dato){
        include 'Obj/Conexion.php';
        $sql = "select * from direcciones where iddire = $dato";
        $result = mysqli_query($conex,$sql);
        $row = mysqli_fetch_array($result);
        $direc = $row['calle']. ", " .$row['colonia']. ", " .$row['alcaldia'];
        return $direc;
    }
?>