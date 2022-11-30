<?php
    include 'Obj/Conexion.php';
    $enfprev = $_POST["enferPrev"];
    $traprev = $_POST["trataPrev"];
    $tiempoMasc = $_POST["tiempMasc"];
    $sale = $_POST["saleCalle"];
    $mascextra = $_POST["mas"]. " ". $_POST["masMasc"];
    $duerme = $_POST["dndDuerme"];
    $viajes = $_POST["viajes"]. " ". $_POST["viajRec"];

    //GATO
    $origen = $_POST["origen"];
    $fuman = $_POST["fumanCasa"];
    $cambRec = $_POST["plntCambios"];
    $platos = $_POST["numeroPlatos"];
    $arenero = $_POST["numAreneros"];
    $material = $_POST["numMaterial"];

    //Dieta    
    //value en radio----Select marcas----suelta/bulto radio-----frecuencia
    //cantidad es un select para unidad input para #
    
    if($_POST["croqueta"] & $_POST["caseraHum"] == "si"){
        $tipodieta = 3;
    }elseif($_POST["croqueta"] == "si"){
        $tipodieta == 1;
    }else{
        $tipodieta = 2;
    }

    //tegumentario
    $lesPiel = $_POST[""];
?>