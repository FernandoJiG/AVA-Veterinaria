<?php
    include 'Conexion.php';
    if(isset($_POST["regPrevio"])){
        $id = $_POST["regPrevio"];
        //Obtener id del telefono y actualizarlo.
        $query="SELECT * FROM propietarios where idprop = '$id'";
        $respuesta=mysqli_query($conex, $query);
        $respuesta = mysqli_fetch_array($respuesta);
        $idtel=$respuesta["idtel"];
        $iddire = $respuesta["iddire"];

        $telef = $_POST['telefono'];//Telefono a actualizar.
        $telefAdi = empty( $_POST['telefonoAdi']) ? "0" : $_POST['telefonoAdi'];
        $query="UPDATE telefonos SET telefono = '$telef', telefonoadi = '$telefAdi' WHERE idtel='$idtel'";
        $respuesta=mysqli_query($conex,$query);

        $calle = $_POST['calle'];//Información de dirección a actualizar.
        $colonia = $_POST['colonia'];
        $alcaldia = $_POST['alcaldia'];
        $estado = $_POST['estado'];
        $pais = $_POST['pais'];
        $codPost = $_POST['codPost'];
        $query="UPDATE direcciones SET calle = '$calle', colonia = '$colonia', alcaldia= '$alcaldia', Estado= '$estado', pais= '$pais', cp= '$codPost' WHERE iddire='$iddire'";
        $respuesta=mysqli_query($conex,$query);

        //Actualización ya con los id de telefono y dirección.
        $nombre = $_POST['nombre'];//Información de propietario a actualizar.
        $apellidoPat = $_POST['apellidoPat'];
        $apellidoMat = $_POST['apellidoMat'];
        $mail = $_POST['correo'];
        $marke = $_POST['marketing'];
        
        $query="UPDATE propietarios SET nombre ='$nombre', apellidoPat = '$apellidoPat', apellidoMat = '$apellidoMat',  idtel = '$idtel', mail = '$mail', iddire = '$iddire', idmkt = '$marke' where  idprop= '$id'";
        $respuesta = mysqli_query($conex, $query);

        //Actualización pero de mascota.
        $nomMasc = $_POST['nombreMasc'];
        $apeMasc = $_POST['apellidoMasc'];
        $sexo = $_POST['sex'];
        $edad = $_POST['edad'];
        $mascota = $_POST['tipoMascota'];//select
        $raza = $_POST['raza'];
        $color = $_POST['color'];
        $esteri = $_POST['esterilizado'];//select
        $doc = $_POST['doctor'];//doctor

        $query="SELECT iddoc from  doctores WHERE nombre_comp= '$doc'";
        $idDoc = mysqli_query($conex, $query);
        $idDoc = mysqli_fetch_array($idDoc);
        $idDoc = $idDoc["iddoc"];

        $query="SELECT idmascota from  pacientes WHERE idprop='$id'";
        $idMascota = mysqli_query($conex, $query);
        $idMascota = mysqli_fetch_array($idMascota);
        $idMascota = $idMascota["idmascota"];

        $query ="UPDATE pacientes SET idprop = '$id', idtipo = '$mascota', iddoc = '$idDoc', idester = '$esteri', nombre = '$nomMasc', apellidoP = '$apeMasc', sexo = '$sexo', raza = '$raza', edad = '$edad', color = '$color' WHERE idmascota = '$idMascota'";
        $respuesta=mysqli_query($conex, $query);

        if($respuesta){
            echo '<script language="javascript">alert("Datos actualizados."); window.location.href="../index.html"</script>';
        }
        
    }
    


?>