<?php
    if(isset($_POST['id'])){
        include 'Conexion.php';
        $id = $_POST['id'];
        
        $sql = "SELECT propietarios.nombre, propietarios.apellidoPat, propietarios.apellidoMat, telefonos.telefono, telefonos.telefonoadi, propietarios.mail, direcciones.calle, direcciones.colonia, direcciones.alcaldia, direcciones.Estado, direcciones.pais, direcciones.cp, mkt.idmkt, pacientes.nombre, pacientes.sexo, pacientes.edad, pacientes.raza, pacientes.color, doctores.cedula, doctores.nombre_comp, pacientes.idester, tipos.idtipo from propietarios INNER JOIN direcciones on propietarios.iddire = direcciones.iddire INNER JOIN telefonos on propietarios.idtel = telefonos.idtel INNER JOIN mkt on propietarios.idmkt = mkt.idmkt INNER JOIN pacientes on propietarios.idprop = pacientes.idprop INNER JOIN tipos on tipos.idtipo = pacientes.idtipo INNER JOIN doctores on doctores.iddoc = pacientes.iddoc WHERE propietarios.idprop = $id";

        $consulta= mysqli_query($conex, $sql);
        $propietario = mysqli_fetch_array($consulta);
        if(isset($propietario)){
            $respuesta = json_encode($propietario);
            
        }else{
            $respuesta="false";
            $respuesta = json_encode($respuesta);
        }
        echo $respuesta;


    }
    

?>