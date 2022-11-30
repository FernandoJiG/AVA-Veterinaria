<?php
   include_once "Obj/Conexion.php";

   $data = json_decode($_POST['valores']);
   var_dump($data);
   foreach($data as $data){
    $sql = "INSERT INTO info_vacuna (idvacuna, idlaboratorio, fecha) VALUES ('$data[0]', '$data[1]', '$data[2]')";
    mysqli_query($conex, $sql);
    unset($data);
   }
   
    /*$vac = $_POST['vacu'];
    $labs = $_POST['labs'];
    $fec = $_POST['fh'];

    $sql = "INSERT INTO pruebas (idvacuna, idlaboratorio, fecha) VALUES ('$vac', '$labs', '$fec')";
    if (mysqli_query($conex, $sql)) {
            // header('Location: ../loans.php?registrationstatus=true');
        echo "Si registro";
    } else {
            // header('Location: ../loans.php?registrationstatus=false');
        echo "No registro";
    }*/

?>