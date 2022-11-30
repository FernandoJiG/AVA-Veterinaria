<?php

    if(isset($_POST["id"])){

        include "Conexion.php";
        $id = $_POST['id'];

        $sql="SELECT propietarios.nombre, propietarios.apellidoPat, propietarios.apellidoMat, telefonos.telefono, telefonos.telefonoAdi, propietarios.mail, direcciones.calle, direcciones.colonia, direcciones.alcaldia, direcciones.Estado, direcciones.pais, direcciones.cp, mkt.idmkt from propietarios INNER JOIN direcciones on propietarios.iddire = direcciones.iddire INNER JOIN telefonos on propietarios.idtel = telefonos.idtel INNER JOIN mkt on propietarios.idmkt = mkt.idmkt where propietarios.idprop = $id";
        $consulta = mysqli_query($conex, $sql);
        $consulta = mysqli_fetch_array($consulta);

        $respuesta = json_encode($consulta);
        echo $respuesta;
    }
?>