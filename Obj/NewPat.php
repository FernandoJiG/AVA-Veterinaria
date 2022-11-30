<?php

include 'Conexion.php';
$nombre = $_POST['nombre'];
$apellidoPat = $_POST['apellidoPat'];
$apellidoMat = $_POST['apellidoMat'];
$mail = $_POST['correo'];

$telef = $_POST['telefono'];
$telefAdi = empty($_POST['telefonoAdi']) ? "0" : $_POST['telefonoAdi'];

$marke = $_POST['marketing'];//select

$calle = $_POST['calle'];
$colonia = $_POST['colonia'];
$alcaldia = $_POST['alcaldia'];

$estado = empty($_POST['estado']) ? "Sin estado" : $_POST['estado'];
$pais = empty($_POST['pais']) ? "Sin pais" : $_POST['pais'];
$codPostal = empty($_POST['codPost']) ? "0" : $_POST['codPost'];


$nomMasc = $_POST['nombreMasc'];
$apeMasc = $_POST['apellidoMasc'];
$sexo = $_POST['sex'];
$edad = $_POST['edad'];
$mascota = $_POST['tipoMascota'];//select
$raza = $_POST['raza'];
$color = $_POST['color'];
$esteri = $_POST['esterilizado'];//select

$doc = empty($_POST['doctor']) ? "sin nombre" : $_POST['doctor'];

//INSERTAR EN TELEFONOS Y BUSCAR ID ASIGNADO
$orden = $conex->prepare("INSERT INTO telefonos (telefono, telefonoadi) values (?,?)");
$orden->bind_param("ss", $telef,$telefAdi);
$orden->execute();
$sql = "select * from telefonos where telefono = '$telef'";
$result = mysqli_query($conex, $sql);
$row = mysqli_fetch_array($result);
$idtel = $row["idtel"];

//INSERTAR EN DIRECCIONES Y BUSCAR ID ASIGNADO
$orden = $conex->prepare("INSERT INTO direcciones (calle,colonia,alcaldia,Estado,pais,cp) values (?,?,?,?,?,?)");
$orden->bind_param("ssssss", $calle,$colonia,$alcaldia,$estado,$pais,$codPostal);
$orden->execute();
$sql = "select * from direcciones where calle = '$calle' and colonia = '$colonia'";
$result = mysqli_query($conex, $sql);
$row = mysqli_fetch_array($result);
$iddirec = $row["iddire"];

//INSERTAR EN PROPIETARIOS Y BUSCAR ID ASIGNADO
$orden = $conex->prepare("INSERT INTO propietarios (nombre,apellidoPat, apellidoMat, idtel,mail,iddire,idmkt) values (?,?,?,?,?,?,?)");
$orden->bind_param("sssssss", $nombre,$apellidoPat,$apellidoMat,$idtel,$mail,$iddirec,$marke);
$orden->execute();
$sql = "select * from propietarios where nombre = '$nombre' and apellidoPat = '$apellidoPat' and apellidoMat = '$apellidoMat'";
$result = mysqli_query($conex,$sql);
$row = mysqli_fetch_array($result);
$idprop = $row["idprop"];

//BUSCAR ID DE DOCTOR ASIGNADO
$sql = "select * from doctores where nombre_comp = '$doc'";
$result = mysqli_query($conex,$sql);
$row = mysqli_fetch_array($result);
$iddoc = $row["iddoc"];

$orden = $conex->prepare("INSERT INTO pacientes (idprop,idtipo,iddoc,idester,nombre,apellidop,sexo,raza,edad,color) values (?,?,?,?,?,?,?,?,?,?)");
$orden->bind_param("ssssssssss", $idprop,$mascota,$iddoc,$esteri,$nomMasc,$apeMasc,$sexo,$raza,$edad,$color);
$orden->execute();

$idprop = json_encode($idprop);

echo $idprop;

?>
