<?php
    include "Conexion.php";
    session_start();
    $id = $_SESSION["IDprop"];

    $nomMasc = $_POST['nombreMasc'];
    $apeMasc = $_POST['apellidoMasc'];
    $sexo = $_POST['sex'];
    $edad = $_POST['edad'];
    $mascota = $_POST['tipoMascota'];//select
    $raza = $_POST['raza'];
    $color = $_POST['color'];
    $esteri = $_POST['esterilizado'];//select

    $doc = $_POST['doctor'];
    //BUSCAR ID DE DOCTOR ASIGNADO
    $sql = "select * from doctores where nombre_comp = '$doc'";
    $result = mysqli_query($conex,$sql);
    $row = mysqli_fetch_array($result);
    $iddoc = $row["iddoc"];

    $query="INSERT INTO pacientes (idprop,idtipo,iddoc,idester,nombre,apellidop,sexo,raza,edad,color) VALUES ('$id', '$mascota', '$iddoc', '$esteri', '$nomMasc', '$apeMasc', '$sexo', '$raza', '$edad', '$color') ";
    $respuesta = mysqli_query($conex, $query);
    
    if($respuesta){
        echo '<script language="javascript">alert("Mascota Registrada."); window.location.href="../index.html"</script>';
    }
?>