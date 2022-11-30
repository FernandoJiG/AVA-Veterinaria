<?php
include "Conexion.php";
if(isset($_POST["busqueda"])){
    $id = $_POST["busqueda"];
    //Obtener id del telefono y actualizarlo.
    $query="SELECT * FROM propietarios where idprop = '$id'";
    $respuesta=mysqli_query($conex, $query);
    $respuesta = mysqli_fetch_array($respuesta);
    $idtel=$respuesta["idtel"];
    $iddire = $respuesta["iddire"];

    $telef = $_POST['telefono'];//Telefono a actualizar.
    $telefonoadi= $_POST["telefonoadi"];
    $query="UPDATE telefonos SET telefono = '$telef', telefonoadi = '$telefonoadi' WHERE idtel='$idtel'";
    $respuesta=mysqli_query($conex,$query);

    $calle = $_POST['calle'];//Información de dirección a actualizar.
    $colonia = $_POST['colonia'];
    $alcaldia = $_POST['alcaldia'];
    $estado = $_POST['estado'];
    $pais = $_POST['pais'];
    $codPost = $_POST['codPost'];
    $query="UPDATE direcciones SET calle = '$calle', colonia = '$colonia', alcaldia= '$alcaldia', Estado= '$estado', pais= '$pais', cp= '$codPost' WHERE iddire='$iddire'";
    $respuesta=mysqli_query($conex,$query);

    //Ultima actualización ya con los id de telefono y dirección.
    $nombre = $_POST['nombre'];//Información de propietario a actualizar.
    $apellidoPat = $_POST['apellidoPat'];
    $apellidoMat = $_POST['apellidoMat'];
    $mail = $_POST['correo'];
    $marke = $_POST['marketing'];
    
    $query="UPDATE propietarios SET nombre ='$nombre', apellidoPat = '$apellidoPat', apellidoMat = '$apellidoMat', idtel = '$idtel', mail = '$mail', iddire = '$iddire', idmkt = '$marke' where  idprop= '$id'";
    $respuesta = mysqli_query($conex, $query);

    echo '<script language="javascript">alert("Datos actualizados."); window.location.href="../index.html"</script>';
}


?>